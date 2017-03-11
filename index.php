<?php 

	require_once("Balada.php");
	require_once("Pessoa.php");

	$balada = new Balada(true, true);
	$pessoa = new Pessoa(18, true);

	if($balada->verificarFesta()) {
		if($pessoa->verificarIdade()) {
			print "Pode entrar na festa";

			if($balada->verificarAmizadeBalada()) {
				print "\nVocê tem amigo na festa";
			} else {
				print "\nVocê não tem amigo na festa";
			}
		} else {
			if($pessoa->verificarAmizade()) {
				print "Menor de idade mas é amigo(a) do dono";
			} else {
				print "Não pode entrar na festa";
			}
		}
	} else {
		print "Festa não está acontecendo";
	}





