﻿<?php
include("funciones.php");
   $dbaddress='localhost'; $dbuser='root'; $dbpass=''; $dbname='mt6020';

$dbcnx = mysql_connect($dbaddress,$dbuser,$dbpass)or die("Could not connect: " . mysql_error());
mysql_select_db($dbname, $dbcnx) or die ('Unable to select the database: ' . mysql_error());
echo "INSERT INTO `realizationmodule`(`fk_user`, `fk_instancemodule`, `dateIni`, `time`, `supervisor`, `percentageQuestions`, `percentageCheck1`, `percentageCheck2`) VALUES (".$_POST['alumno'].",".$_POST['idInstanceModule'].",\"".$_POST['Fecha']."\",".$_POST['ResultadoTiempo'].",".$_POST['supervisor'].",".$_POST['ResultadoPreguntas'].",".$_POST['ResultadoCheck1'].",".$_POST['ResultadoCheck2'].")";
$query=mysql_query("INSERT INTO `realizationmodule`(`fk_user`, `fk_instancemodule`, `dateIni`, `time`, `supervisor`, `percentageQuestions`, `percentageCheck1`, `percentageCheck2`) VALUES (".$_POST['alumno'].",".$_POST['idInstanceModule'].",\"".$_POST['Fecha']."\",".$_POST['ResultadoTiempo'].",".$_POST['supervisor'].",".$_POST['ResultadoPreguntas'].",".$_POST['ResultadoCheck1'].",".$_POST['ResultadoCheck2'].")") or die("-2");
$idRealization=mysql_insert_id();
echo $idRealization;
if($_POST['tipoModulo'] == "operacional"){
	echo "INSERT INTO operationalmoduledetail (fk_realizationmodule) VALUES ($idRealization);";
	$query = mysql_query("INSERT INTO operationalmoduledetail (fk_realizationmodule) VALUES ($idRealization);");
	$idOperationalModuleDetail=mysql_insert_id();
	if($_POST['ResultadoVueltasRealizadas'] != ''){
		mysql_query("INSERT INTO operationalmoduleestadisticdetail (fk_operationalModuleDetail, fk_detail, value) VALUES ($idOperationalModuleDetail, 1, ".$_POST['ResultadoVueltasRealizadas'].");"); }
	if($_POST['ResultadoTonelajeTotal'] != ''){
		mysql_query("INSERT INTO operationalmoduleestadisticdetail (fk_operationalModuleDetail, fk_detail, value) VALUES ($idOperationalModuleDetail, 19, ".$_POST['ResultadoTonelajeTotal'].");"); }
	if($_POST['ResultadoPorcentajeCaidaMat'] != ''){
		mysql_query("INSERT INTO operationalmoduleestadisticdetail (fk_operationalModuleDetail, fk_detail, value) VALUES ($idOperationalModuleDetail, 20, ".$_POST['ResultadoPorcentajeCaidaMat'].");"); }
	if($_POST['ResultadoIntMaquina'] != ''){
		mysql_query("INSERT INTO operationalmoduleestadisticdetail (fk_operationalModuleDetail, fk_detail, value) VALUES ($idOperationalModuleDetail, 9, ".$_POST['ResultadoIntMaquina'].");"); }
	if($_POST['ResultadoIntFrontal'] != ''){
		mysql_query("INSERT INTO operationalmoduleestadisticdetail (fk_operationalModuleDetail, fk_detail, value) VALUES ($idOperationalModuleDetail, 3, ".$_POST['ResultadoIntFrontal'].");"); }
	if($_POST['ResultadoIntMotorDer'] != ''){
		mysql_query("INSERT INTO operationalmoduleestadisticdetail (fk_operationalModuleDetail, fk_detail, value) VALUES ($idOperationalModuleDetail, 4, ".$_POST['ResultadoIntMotorDer'].");"); }
	if($_POST['ResultadoIntMotorIzq'] != ''){
		mysql_query("INSERT INTO operationalmoduleestadisticdetail (fk_operationalModuleDetail, fk_detail, value) VALUES ($idOperationalModuleDetail, 5, ".$_POST['ResultadoIntMotorIzq'].");"); }
	if($_POST['ResultadoIntTolvaDer'] != ''){
		mysql_query("INSERT INTO operationalmoduleestadisticdetail (fk_operationalModuleDetail, fk_detail, value) VALUES ($idOperationalModuleDetail, 6, ".$_POST['ResultadoIntTolvaDer'].");"); }
	if($_POST['ResultadoIntTolvaIzq'] != ''){
		mysql_query("INSERT INTO operationalmoduleestadisticdetail (fk_operationalModuleDetail, fk_detail, value) VALUES ($idOperationalModuleDetail, 7, ".$_POST['ResultadoIntTolvaIzq'].");"); }
}
if($_POST['tipoModulo'] == "informacion"){
}
if($_POST['tipoModulo'] == "checklist"){
	if($_POST['CheckNivPet'] != '' && $_POST['ResultadoCheckNivPet'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,1,".$_POST['CheckNivPet'].",".$_POST['ResultadoCheckNivPet'].")");
	}
	if($_POST['CheckNivAceMot'] != '' && $_POST['ResultadoCheckNivAceMot'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,2,".$_POST['CheckNivAceMot'].",".$_POST['ResultadoCheckNivAceMot'].")");
	}
	if($_POST['CheckNivAceHid'] != '' && $_POST['ResultadoCheckNivAceHid'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,3,".$_POST['CheckNivAceHid'].",".$_POST['ResultadoCheckNivAceHid'].")");
	}
	if($_POST['CheckEstLuc'] != '' && $_POST['ResultadoCheckEstLuc'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,4,".$_POST['CheckEstLuc'].",".$_POST['ResultadoCheckEstLuc'].")");
	}
	if($_POST['CheckEstNeu'] != '' && $_POST['ResultadoCheckEstNeu'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,5,".$_POST['CheckEstNeu'].",".$_POST['ResultadoEstNeu'].")");
	}
	if($_POST['CheckNivRef'] != '' && $_POST['ResultadoCheckNivRef'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,6,".$_POST['CheckNivRef'].",".$_POST['ResultadoCheckNivRef'].")");
	}
	if($_POST['CheckNivAceTra'] != '' && $_POST['ResultadoCheckNivAceTra'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,7,".$_POST['CheckNivAceTra'].",".$_POST['ResultadoCheckNivAceTra'].")");
	}
	if($_POST['CheckNivAceTransf'] != '' && $_POST['ResultadoCheckNivAceTransf'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,8,".$_POST['CheckNivAceTransf'].",".$_POST['ResultadoCheckNivAceTransf'].")");
	}
	if($_POST['CheckFiltro'] != '' && $_POST['ResultadoCheckFiltro'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,9,".$_POST['CheckFiltro'].",".$_POST['ResultadoCheckFiltro'].")");
	}
	if($_POST['CheckIndObs'] != '' && $_POST['ResultadoCheckIndObs'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,10,".$_POST['CheckIndObs'].",".$_POST['ResultadoCheckIndObs'].")");
	}
	if($_POST['CheckLucGen'] != '' && $_POST['ResultadoCheckLucGen'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,11,".$_POST['CheckLucGen'].",".$_POST['ResultadoCheckLucGen'].")");
	}
	if($_POST['CheckLimPar'] != '' && $_POST['ResultadoCheckLimPar'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,12,".$_POST['CheckLimPar'].",".$_POST['ResultadoCheckLimPar'].")");
	}
	if($_POST['CheckAirAco'] != '' && $_POST['ResultadoCheckAirAco'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,13,".$_POST['CheckAirAco'].",".$_POST['ResultadoCheckAirAco'].")");
	}
	if($_POST['CheckMan'] != '' && $_POST['ResultadoCheckMan'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,14,".$_POST['CheckMan'].",".$_POST['ResultadoCheckMan'].")");
	}
	if($_POST['CheckMon'] != '' && $_POST['ResultadoCheckMon'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,15,".$_POST['CheckMon'].",".$_POST['ResultadoCheckMon'].")");
	}
	if($_POST['CheckAseCab'] != '' && $_POST['ResultadoCheckAseCab'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,16,".$_POST['CheckAseCab'].",".$_POST['ResultadoCheckAseCab'].")");
	}
	if($_POST['CheckBoc'] != '' && $_POST['ResultadoCheckBoc'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,17,".$_POST['CheckBoc'].",".$_POST['ResultadoCheckBoc'].")");
	}
	if($_POST['CheckTol'] != '' && $_POST['ResultadoCheckTol'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,18,".$_POST['CheckTol'].",".$_POST['ResultadoCheckTol'].")");
	}
	if($_POST['CheckTopEjeCen'] != '' && $_POST['ResultadoCheckTopEjeCen'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,19,".$_POST['CheckTopEjeCen'].",".$_POST['ResultadoCheckTopEjeCen'].")");
	}
	if($_POST['CheckArtCen'] != '' && $_POST['ResultadoCheckArtCen'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,20,".$_POST['CheckArtCen'].",".$_POST['ResultadoCheckArtCen'].")");
	}
	if($_POST['CheckArtDir'] != '' && $_POST['ResultadoCheckArtDir'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,21,".$_POST['CheckArtDir'].",".$_POST['ResultadoCheckArtDir'].")");
	}
	if($_POST['CheckPasGen'] != '' && $_POST['ResultadoCheckPasGen'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,22,".$_POST['CheckPasGen'].",".$_POST['ResultadoCheckPasGen'].")");
	}
	if($_POST['CheckFug'] != '' && $_POST['ResultadoCheckFug'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,23,".$_POST['CheckFug'].",".$_POST['ResultadoCheckFug'].")");
	}
	if($_POST['CheckMotEnf'] != '' && $_POST['ResultadoCheckMotEnf'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,24,".$_POST['CheckMotEnf'].",".$_POST['ResultadoCheckMotEnf'].")");
	}
	if($_POST['CheckEstExtMan'] != '' && $_POST['ResultadoCheckEstExtMan'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,25,".$_POST['CheckEstExtMan'].",".$_POST['ResultadoCheckEstExtMan'].")");
	}
	if($_POST['CheckEstExtInc'] != '' && $_POST['ResultadoCheckEstExtInc'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,26,".$_POST['CheckEstExtInc'].",".$_POST['ResultadoCheckEstExtInc'].")");
	}
	if($_POST['CheckEstEsc'] != '' && $_POST['ResultadoCheckEstEsc'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,27,".$_POST['CheckEstEsc'].",".$_POST['ResultadoCheckEstEsc'].")");
	}
	if($_POST['CheckSalEme'] != '' && $_POST['ResultadoCheckSalEme'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,28,".$_POST['CheckSalEme'].",".$_POST['ResultadoCheckSalEme'].")");
	}
	if($_POST['CheckCheFirCab'] != '' && $_POST['ResultadoCheckCheFirCab'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,29,".$_POST['CheckCheFirCab'].",".$_POST['ResultadoCheckCheFirCab'].")");
	}
	if($_POST['CheckCabCheFir'] != '' && $_POST['ResultadoCheckCabCheFir'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,30,".$_POST['CheckCabCheFir'].",".$_POST['ResultadoCheckCabCheFir'].")");
	}
	if($_POST['CheckSistAnsul'] != '' && $_POST['ResultadoCheckSistAnsul'] != ''){
		mysql_query("INSERT INTO checkmoduledetail (fk_realizationmodule,fk_checkquestion,correctAnswer,answerMade) VALUES ($idRealization,31,".$_POST['CheckSistAnsul'].",".$_POST['ResultadoCheckSistAnsul'].")");
	}

}

/*
$query=mysql_query("INSERT INTO `Historial`(`IdNivel`, `Fecha`, `PorPreguntas`, `TiempoEmpleado`, `Check1`, `revFunc1`, `revEst1`, `revCab1`, `prevRies1`, `Check2`, `revFunc2`, `revEst2`, `revCab2`, `prevRies2`, `OrdenEj`, `MotorPunta`, `BaldePunta`, `VueltasCorrectas`, `EntregaNombrada`, `EntregaNombradaSup`, `TonelajeTotal`, `CaidaMat`, `CorrectoCarguio`, `Patinaje`, `IntMaquina`, `IntBalde`, `IntCabina`, `IntMedioDer`, `IntPost`, `IntPostIzq`, `IntPostDer`, `Zipper`, `CantZipper`, `Tunel`, `CantTunel`, `Camion`, `CantCamion`, `Traslado`, `CantVueltas`, `TerminoFaena`, `NumPreguntasContestadas`, `OrdenEjecucionTiempo`, `PuntoPartidaTiempo`, `PreguntasFaena1`, `PreguntasFaena2`, `PreguntasFaena3`, `PreguntasFaena4`, `CamionMinimo`, `CamionDescuento`, `CamionetaMinimo`, `CamionetaDescuento`, `CamionetaIntegridad`, `FallaOperacional` ) VALUES (\"".$_POST['IdNivel']."\",\"".$_POST['Fecha']."\",\"".$_POST['PorPreguntas']."\",\"".$_POST['TiempoEmpleado']."\",\"".$_POST['Check1']."\",\"".$_POST['revFunc1']."\",\"".$_POST['revEst1']."\",\"".$_POST['revCab1']."\",\"".$_POST['prevRies1']."\",\"".$_POST['Check2']."\",\"".$_POST['revFunc2']."\",\"".$_POST['revEst2']."\",\"".$_POST['revCab2']."\",\"".$_POST['prevRies2']."\",\"".$_POST['OrdenEj']."\",\"".$_POST['MotorPunta']."\",\"".$_POST['BaldePunta']."\",\"".$_POST['VueltasCorrectas']."\",\"".$_POST['EntregaNombrada']."\",\"".$_POST['EntregaNombradaSup']."\",\"".$_POST['TonelajeTotal']."\",\"".$_POST['CaidaMat']."\",\"".$_POST['CorrectoCarguio']."\",\"".$_POST['Patinaje']."\",\"".$_POST['IntMaquina']."\",\"".$_POST['IntBalde']."\",\"".$_POST['IntCabina']."\",\"".$_POST['IntMedioDer']."\",\"".$_POST['IntPost']."\",\"".$_POST['IntPostIzq']."\",\"".$_POST['IntPostDer']."\",\"".$_POST['Zipper']."\",\"".$_POST['CantZipper']."\",\"".$_POST['Tunel']."\",\"".$_POST['CantTunel']."\",\"".$_POST['Camion']."\",\"".$_POST['CantCamion']."\",\"".$_POST['Traslado']."\",\"".$_POST['CantVueltas']."\",\"".$_POST['TerminoFaena']."\",\"".$_POST['ResultadoNumPreguntasContestadas']."\",\"".$_POST['ResultadoOrdenEjecTiempo']."\",\"".$_POST['ResultadoPuntoPartidaTiempo']."\",\"".$_POST['ResultadoPreguntasCorta1']."\",\"".$_POST['ResultadoPreguntasCorta2']."\",\"".$_POST['ResultadoPreguntasCorta3']."\",\"".$_POST['ResultadoPreguntasCorta4']."\",\"".$_POST['CamionMin']."\",\"".$_POST['CamionDes']."\",\"".$_POST['CamionetaMin']."\",\"".$_POST['CamionetaDes']."\",\"".$_POST['Camioneta']."\",\"".$_POST['ResultadoFallaOperacion']."\")") or die("-2");

$idHistorial=mysql_insert_id();
//$idAlumno=$_POST['idAlumno'];
// insertar en alumno historial
$query2=mysql_query("insert into Historial_Alumno(IdAlumno,IdHistorial, Fecha) values(\"".$_POST['idAlumno']."\",\"".$idHistorial."\",\"".$_POST['Fecha']."\")")or die("-3");
if($_POST['CheckRFNivAceMot'] != null && $_POST['CheckRFNivAceMot'] != ""){
	echo "insert into checklist(fk_historial, CheckRFNivPet, ResultadoCheckRFNivPet, CheckRFNivAceMot, ResultadoCheckRFNivAceMot, CheckRFNivAceHid,ResultadoCheckRFNivAceHid,CheckRFEstLuc,ResultadoCheckRFEstLuc,CheckRFEstNeu,ResultadoCheckRFEstNeu,CheckRFNivRef,ResultadoCheckRFNivRef,CheckRFNivAceTra,ResultadoCheckRFNivAceTra,CheckREBal,ResultadoCheckREBal,CheckREAnt,ResultadoCheckREAnt,CheckREArtCen,ResultadoCheckREArtCen,CheckREPasGen,ResultadoCheckREPasGen,CheckREFug,ResultadoCheckREFug,CheckRCLimPar,ResultadoCheckRCLimPar,CheckRCMan,ResultadoCheckRCMan,CheckRCLucGen,ResultadoCheckRCLucGen,CheckRCMonDis,ResultadoCheckRCMonDis,CheckRCAseCab,ResultadoCheckRCAseCab,CheckRCBoc,ResultadoCheckRCBoc,CheckPREstExtMan,ResultadoCheckPREstExtMan,CheckPREstExtInc,ResultadoCheckPREstExtInc,CheckPREstEsc,ResultadoCheckPREstEsc,CheckPRSalEme,ResultadoCheckPRSalEme,CheckPRSenMov,ResultadoCheckPRSenMov,CheckRCCab,ResultadoCheckRCCab, CheckRCTemAceMot, ResultadoCheckRCTemAceMot, CheckRCTemAceTra, ResultadoCheckRCTemAceTra, CheckRCVen, ResultadoCheckRCVen, CheckRCJoy, ResultadoCheckRCJoy, CheckRCPed, ResultadoCheckRCPed) values(".$idHistorial.",\"".$_POST['CheckRFNivPet']."\",\"".$_POST['ResultadoCheckRFNivPet']."\",\"".$_POST['CheckRFNivAceMot']."\",\"".$_POST['ResultadoCheckRFNivAceMot']."\",\"".$_POST['CheckRFNivAceHid']."\",\"".$_POST['ResultadoCheckRFNivAceHid']."\",\"".$_POST['CheckRFEstLuc']."\",\"".$_POST['ResultadoCheckRFEstLuc']."\",\"".$_POST['CheckRFEstNeu']."\",\"".$_POST['ResultadoCheckRFEstNeu']."\",\"".$_POST['CheckRFNivRef']."\",\"".$_POST['ResultadoCheckRFNivRef']."\",\"".$_POST['CheckRFNivAceTra']."\",\"".$_POST['ResultadoCheckRFNivAceTra']."\",\"".$_POST['CheckREBal']."\",\"".$_POST['ResultadoCheckREBal']."\",\"".$_POST['CheckREAnt']."\",\"".$_POST['ResultadoCheckREAnt']."\",\"".$_POST['CheckREArtCen']."\",\"".$_POST['ResultadoCheckREArtCen']."\",\"".$_POST['CheckREPasGen']."\",\"".$_POST['ResultadoCheckREPasGen']."\",\"".$_POST['CheckREFug']."\",\"".$_POST['ResultadoCheckREFug']."\",\"".$_POST['CheckRCLimPar']."\",\"".$_POST['ResultadoCheckRCLimPar']."\",\"".$_POST['CheckRCMan']."\",\"".$_POST['ResultadoCheckRCMan']."\",\"".$_POST['CheckRCLucGen']."\",\"".$_POST['ResultadoCheckRCLucGen']."\",\"".$_POST['CheckRCMonDis']."\",\"".$_POST['ResultadoCheckRCMonDis']."\",\"".$_POST['CheckRCAseCab']."\",\"".$_POST['ResultadoCheckRCAseCab']."\",\"".$_POST['CheckRCBoc']."\",\"".$_POST['ResultadoCheckRCBoc']."\",\"".$_POST['CheckPREstExtMan']."\",\"".$_POST['ResultadoCheckPREstExtMan']."\",\"".$_POST['CheckPREstExtInc']."\",\"".$_POST['ResultadoCheckPREstExtInc']."\",\"".$_POST['CheckPREstEsc']."\",\"".$_POST['ResultadoCheckPREstEsc']."\",\"".$_POST['CheckPRSalEme']."\",\"".$_POST['ResultadoCheckPRSalEme']."\",\"".$_POST['CheckPRSenMov']."\",\"".$_POST['ResultadoCheckPRSenMov']."\",\"".$_POST['CheckRCCab']."\",\"".$_POST['ResultadoCheckRCCab']."\",\"".$_POST['CheckRCTemAceMot']."\",\"".$_POST['ResultadoCheckRCTemAceMot']."\",\"".$_POST['CheckRCTemAceTra']."\",\"".$_POST['ResultadoCheckRCTemAceTra']."\",\"".$_POST['CheckRCVen']."\",\"".$_POST['ResultadoCheckRCVen']."\",\"".$_POST['CheckRCJoy']."\",\"".$_POST['ResultadoCheckRCJoy']."\",\"".$_POST['CheckRCPed']."\",\"".$_POST['ResultadoCheckRCPed']."\")";
	$query3=mysql_query("insert into checklist(fk_historial, CheckRFNivPet, ResultadoCheckRFNivPet, CheckRFNivAceMot, ResultadoCheckRFNivAceMot, CheckRFNivAceHid,ResultadoCheckRFNivAceHid,CheckRFEstLuc,ResultadoCheckRFEstLuc,CheckRFEstNeu,ResultadoCheckRFEstNeu,CheckRFNivRef,ResultadoCheckRFNivRef,CheckRFNivAceTra,ResultadoCheckRFNivAceTra,CheckREBal,ResultadoCheckREBal,CheckREAnt,ResultadoCheckREAnt,CheckREArtCen,ResultadoCheckREArtCen,CheckREPasGen,ResultadoCheckREPasGen,CheckREFug,ResultadoCheckREFug,CheckRCLimPar,ResultadoCheckRCLimPar,CheckRCMan,ResultadoCheckRCMan,CheckRCLucGen,ResultadoCheckRCLucGen,CheckRCMonDis,ResultadoCheckRCMonDis,CheckRCAseCab,ResultadoCheckRCAseCab,CheckRCBoc,ResultadoCheckRCBoc,CheckPREstExtMan,ResultadoCheckPREstExtMan,CheckPREstExtInc,ResultadoCheckPREstExtInc,CheckPREstEsc,ResultadoCheckPREstEsc,CheckPRSalEme,ResultadoCheckPRSalEme,CheckPRSenMov,ResultadoCheckPRSenMov,CheckRCCab,ResultadoCheckRCCab, CheckRCTemAceMot, ResultadoCheckRCTemAceMot, CheckRCTemAceTra, ResultadoCheckRCTemAceTra, CheckRCVen, ResultadoCheckRCVen, CheckRCJoy, ResultadoCheckRCJoy, CheckRCPed, ResultadoCheckRCPed) values(".$idHistorial.",\"".$_POST['CheckRFNivPet']."\",\"".$_POST['ResultadoCheckRFNivPet']."\",\"".$_POST['CheckRFNivAceMot']."\",\"".$_POST['ResultadoCheckRFNivAceMot']."\",\"".$_POST['CheckRFNivAceHid']."\",\"".$_POST['ResultadoCheckRFNivAceHid']."\",\"".$_POST['CheckRFEstLuc']."\",\"".$_POST['ResultadoCheckRFEstLuc']."\",\"".$_POST['CheckRFEstNeu']."\",\"".$_POST['ResultadoCheckRFEstNeu']."\",\"".$_POST['CheckRFNivRef']."\",\"".$_POST['ResultadoCheckRFNivRef']."\",\"".$_POST['CheckRFNivAceTra']."\",\"".$_POST['ResultadoCheckRFNivAceTra']."\",\"".$_POST['CheckREBal']."\",\"".$_POST['ResultadoCheckREBal']."\",\"".$_POST['CheckREAnt']."\",\"".$_POST['ResultadoCheckREAnt']."\",\"".$_POST['CheckREArtCen']."\",\"".$_POST['ResultadoCheckREArtCen']."\",\"".$_POST['CheckREPasGen']."\",\"".$_POST['ResultadoCheckREPasGen']."\",\"".$_POST['CheckREFug']."\",\"".$_POST['ResultadoCheckREFug']."\",\"".$_POST['CheckRCLimPar']."\",\"".$_POST['ResultadoCheckRCLimPar']."\",\"".$_POST['CheckRCMan']."\",\"".$_POST['ResultadoCheckRCMan']."\",\"".$_POST['CheckRCLucGen']."\",\"".$_POST['ResultadoCheckRCLucGen']."\",\"".$_POST['CheckRCMonDis']."\",\"".$_POST['ResultadoCheckRCMonDis']."\",\"".$_POST['CheckRCAseCab']."\",\"".$_POST['ResultadoCheckRCAseCab']."\",\"".$_POST['CheckRCBoc']."\",\"".$_POST['ResultadoCheckRCBoc']."\",\"".$_POST['CheckPREstExtMan']."\",\"".$_POST['ResultadoCheckPREstExtMan']."\",\"".$_POST['CheckPREstExtInc']."\",\"".$_POST['ResultadoCheckPREstExtInc']."\",\"".$_POST['CheckPREstEsc']."\",\"".$_POST['ResultadoCheckPREstEsc']."\",\"".$_POST['CheckPRSalEme']."\",\"".$_POST['ResultadoCheckPRSalEme']."\",\"".$_POST['CheckPRSenMov']."\",\"".$_POST['ResultadoCheckPRSenMov']."\",\"".$_POST['CheckRCCab']."\",\"".$_POST['ResultadoCheckRCCab']."\",\"".$_POST['CheckRCTemAceMot']."\",\"".$_POST['ResultadoCheckRCTemAceMot']."\",\"".$_POST['CheckRCTemAceTra']."\",\"".$_POST['ResultadoCheckRCTemAceTra']."\",\"".$_POST['CheckRCVen']."\",\"".$_POST['ResultadoCheckRCVen']."\",\"".$_POST['CheckRCJoy']."\",\"".$_POST['ResultadoCheckRCJoy']."\",\"".$_POST['CheckRCPed']."\",\"".$_POST['ResultadoCheckRCPed']."\")")or die("-3");
}
if($_POST['CheckRFNivAceMot2'] != null && $_POST['CheckRFNivAceMot2'] != ""){
	$query3=mysql_query("insert into checklist(fk_historial, CheckRFNivPet, ResultadoCheckRFNivPet, CheckRFNivAceMot, ResultadoCheckRFNivAceMot, CheckRFNivAceHid,ResultadoCheckRFNivAceHid,CheckRFEstLuc,ResultadoCheckRFEstLuc,CheckRFEstNeu,ResultadoCheckRFEstNeu,CheckRFNivRef,ResultadoCheckRFNivRef,CheckRFNivAceTra,ResultadoCheckRFNivAceTra,CheckREBal,ResultadoCheckREBal,CheckREAnt,ResultadoCheckREAnt,CheckREArtCen,ResultadoCheckREArtCen,CheckREPasGen,ResultadoCheckREPasGen,CheckREFug,ResultadoCheckREFug,CheckRCLimPar,ResultadoCheckRCLimPar,CheckRCMan,ResultadoCheckRCMan,CheckRCLucGen,ResultadoCheckRCLucGen,CheckRCMonDis,ResultadoCheckRCMonDis,CheckRCAseCab,ResultadoCheckRCAseCab,CheckRCBoc,ResultadoCheckRCBoc,CheckPREstExtMan,ResultadoCheckPREstExtMan,CheckPREstExtInc,ResultadoCheckPREstExtInc,CheckPREstEsc,ResultadoCheckPREstEsc,CheckPRSalEme,ResultadoCheckPRSalEme,CheckPRSenMov,ResultadoCheckPRSenMov,CheckRCCab,ResultadoCheckRCCab, CheckRCTemAceMot, ResultadoCheckRCTemAceMot, CheckRCTemAceTra, ResultadoCheckRCTemAceTra, CheckRCVen, ResultadoCheckRCVen, CheckRCJoy, ResultadoCheckRCJoy, CheckRCPed, ResultadoCheckRCPed) values(".$idHistorial.",\"".$_POST['CheckRFNivPet2']."\",\"".$_POST['ResultadoCheckRFNivPet2']."\",\"".$_POST['CheckRFNivAceMot2']."\",\"".$_POST['ResultadoCheckRFNivAceMot2']."\",\"".$_POST['CheckRFNivAceHid2']."\",\"".$_POST['ResultadoCheckRFNivAceHid2']."\",\"".$_POST['CheckRFEstLuc2']."\",\"".$_POST['ResultadoCheckRFEstLuc2']."\",\"".$_POST['CheckRFEstNeu2']."\",\"".$_POST['ResultadoCheckRFEstNeu2']."\",\"".$_POST['CheckRFNivRef2']."\",\"".$_POST['ResultadoCheckRFNivRef2']."\",\"".$_POST['CheckRFNivAceTra2']."\",\"".$_POST['ResultadoCheckRFNivAceTra2']."\",\"".$_POST['CheckREBal2']."\",\"".$_POST['ResultadoCheckREBal2']."\",\"".$_POST['CheckREAnt2']."\",\"".$_POST['ResultadoCheckREAnt2']."\",\"".$_POST['CheckREArtCen2']."\",\"".$_POST['ResultadoCheckREArtCen2']."\",\"".$_POST['CheckREPasGen2']."\",\"".$_POST['ResultadoCheckREPasGen2']."\",\"".$_POST['CheckREFug2']."\",\"".$_POST['ResultadoCheckREFug2']."\",\"".$_POST['CheckRCLimPar2']."\",\"".$_POST['ResultadoCheckRCLimPar2']."\",\"".$_POST['CheckRCMan2']."\",\"".$_POST['ResultadoCheckRCMan2']."\",\"".$_POST['CheckRCLucGen2']."\",\"".$_POST['ResultadoCheckRCLucGen2']."\",\"".$_POST['CheckRCMonDis2']."\",\"".$_POST['ResultadoCheckRCMonDis2']."\",\"".$_POST['CheckRCAseCab2']."\",\"".$_POST['ResultadoCheckRCAseCab2']."\",\"".$_POST['CheckRCBoc2']."\",\"".$_POST['ResultadoCheckRCBoc2']."\",\"".$_POST['CheckPREstExtMan2']."\",\"".$_POST['ResultadoCheckPREstExtMan2']."\",\"".$_POST['CheckPREstExtInc2']."\",\"".$_POST['ResultadoCheckPREstExtInc2']."\",\"".$_POST['CheckPREstEsc2']."\",\"".$_POST['ResultadoCheckPREstEsc2']."\",\"".$_POST['CheckPRSalEme2']."\",\"".$_POST['ResultadoCheckPRSalEme2']."\",\"".$_POST['CheckPRSenMov2']."\",\"".$_POST['ResultadoCheckPRSenMov2']."\",\"".$_POST['CheckRCCab2']."\",\"".$_POST['ResultadoCheckRCCab2']."\",\"".$_POST['CheckRCTemAceMot2']."\",\"".$_POST['ResultadoCheckRCTemAceMot2']."\",\"".$_POST['CheckRCTemAceTra2']."\",\"".$_POST['ResultadoCheckRCTemAceTra2']."\",\"".$_POST['CheckRCVen2']."\",\"".$_POST['ResultadoCheckRCVen2']."\",\"".$_POST['CheckRCJoy2']."\",\"".$_POST['ResultadoCheckRCJoy2']."\",\"".$_POST['CheckRCPed2']."\",\"".$_POST['ResultadoCheckRCPed2']."\")")or die("-32");
	//echo "insert into checklist(fk_historial, CheckRFNivPet, ResultadoCheckRFNivPet, CheckRFNivAceMot, ResultadoCheckRFNivAceMot, CheckRFNivAceHid,ResultadoCheckRFNivAceHid,CheckRFEstLuc,ResultadoCheckRFEstLuc,CheckRFEstNeu,ResultadoCheckRFEstNeu,CheckRFNivRef,ResultadoCheckRFNivRef,CheckRFNivAceTra,ResultadoCheckRFNivAceTra,CheckREBal,ResultadoCheckREBal,CheckREAnt,ResultadoCheckREAnt,CheckREArtCen,ResultadoCheckREArtCen,CheckREPasGen,ResultadoCheckREPasGen,CheckREFug,ResultadoCheckREFug,CheckRCLimPar,ResultadoCheckRCLimPar,CheckRCMan,ResultadoCheckRCMan,CheckRCLucGen,ResultadoCheckRCLucGen,CheckRCMonDis,ResultadoCheckRCMonDis,CheckRCAseCab,ResultadoCheckRCAseCab,CheckRCBoc,ResultadoCheckRCBoc,CheckPREstExtMan,ResultadoCheckPREstExtMan,CheckPREstExtInc,ResultadoCheckPREstExtInc,CheckPREstEsc,ResultadoCheckPREstEsc,CheckPRSalEme,ResultadoCheckPRSalEme,CheckPRSenMov,ResultadoCheckPRSenMov,CheckRCCab,ResultadoCheckRCCab, CheckRCTemAceMot, ResultadoCheckRCTemAceMot, CheckRCTemAceTra, ResultadoCheckRCTemAceTra, CheckRCVen, ResultadoCheckRCVen, CheckRCJoy, ResultadoCheckRCJoy, CheckRCPed, ResultadoCheckRCPed) values(".$idHistorial.",\"".$_POST['CheckRFNivPet2']."\",\"".$_POST['ResultadoCheckRFNivPet2']."\",\"".$_POST['CheckRFNivAceMot2']."\",\"".$_POST['ResultadoCheckRFNivAceMot2']."\",\"".$_POST['CheckRFNivAceHid2']."\",\"".$_POST['ResultadoCheckRFNivAceHid2']."\",\"".$_POST['CheckRFEstLuc2']."\",\"".$_POST['ResultadoCheckRFEstLuc2']."\",\"".$_POST['CheckRFEstNeu2']."\",\"".$_POST['ResultadoCheckRFEstNeu2']."\",\"".$_POST['CheckRFNivRef2']."\",\"".$_POST['ResultadoCheckRFNivRef2']."\",\"".$_POST['CheckRFNivAceTra2']."\",\"".$_POST['ResultadoCheckRFNivAceTra2']."\",\"".$_POST['CheckREBal2']."\",\"".$_POST['ResultadoCheckREBal2']."\",\"".$_POST['CheckREAnt2']."\",\"".$_POST['ResultadoCheckREAnt2']."\",\"".$_POST['CheckREArtCen2']."\",\"".$_POST['ResultadoCheckREArtCen2']."\",\"".$_POST['CheckREPasGen2']."\",\"".$_POST['ResultadoCheckREPasGen2']."\",\"".$_POST['CheckREFug2']."\",\"".$_POST['ResultadoCheckREFug2']."\",\"".$_POST['CheckRCLimPar2']."\",\"".$_POST['ResultadoCheckRCLimPar2']."\",\"".$_POST['CheckRCMan2']."\",\"".$_POST['ResultadoCheckRCMan2']."\",\"".$_POST['CheckRCLucGen2']."\",\"".$_POST['ResultadoCheckRCLucGen2']."\",\"".$_POST['CheckRCMonDis2']."\",\"".$_POST['ResultadoCheckRCMonDis2']."\",\"".$_POST['CheckRCAseCab2']."\",\"".$_POST['ResultadoCheckRCAseCab2']."\",\"".$_POST['CheckRCBoc2']."\",\"".$_POST['ResultadoCheckRCBoc2']."\",\"".$_POST['CheckPREstExtMan2']."\",\"".$_POST['ResultadoCheckPREstExtMan2']."\",\"".$_POST['CheckPREstExtInc2']."\",\"".$_POST['ResultadoCheckPREstExtInc2']."\",\"".$_POST['CheckPREstEsc2']."\",\"".$_POST['ResultadoCheckPREstEsc2']."\",\"".$_POST['CheckPRSalEme2']."\",\"".$_POST['ResultadoCheckPRSalEme2']."\",\"".$_POST['CheckPRSenMov2']."\",\"".$_POST['ResultadoCheckPRSenMov2']."\",\"".$_POST['CheckRCCab2']."\",\"".$_POST['ResultadoCheckRCCab2']."\",\"".$_POST['CheckRCTemAceMot2']."\",\"".$_POST['ResultadoCheckRCTemAceMot2']."\",\"".$_POST['CheckRCTemAceTra2']."\",\"".$_POST['ResultadoCheckRCTemAceTra2']."\",\"".$_POST['CheckRCVen2']."\",\"".$_POST['ResultadoCheckRCVen2']."\",\"".$_POST['CheckRCJoy2']."\",\"".$_POST['ResultadoCheckRCJoy2']."\",\"".$_POST['CheckRCPed2']."\",\"".$_POST['ResultadoCheckRCPed2']."\")";

}
for($i = 1; $i <= 20; $i++){
	if($_POST['ResultadoVuelta'.($i)] != null && $_POST['ResultadoVuelta'.($i)] != ""){
		$query4=mysql_query("insert into vuelta(fk_historial, numVuelta, tiempo) values(\"".$idHistorial."\",\"".$i."\",\"".$_POST['ResultadoVuelta'.($i)]."\")")or die("-4");
	}
}
for($i = 1; $i <= 40; $i++){
	if($_POST['ResultadoCarguioNumero'.($i)] != null && $_POST['ResultadoCarguioNumero'.($i)] != ""){
		$query5=mysql_query("insert into ciclocarguio(fk_historial, numciclo, carguio, patinaje, levante, caida, vaciado, tiempo) values(\"".$idHistorial."\",\"".$i."\",\"".$_POST['ResultadoCarguioCarguio'.($i)]."\",\"".$_POST['ResultadoCarguioPatinaje'.($i)]."\",\"".$_POST['ResultadoCarguioLevante'.($i)]."\",\"".$_POST['ResultadoCarguioCaida'.($i)]."\",\"".$_POST['ResultadoCarguioVaciado'.($i)]."\",\"".$_POST['ResultadoCarguioTiempo'.($i)]."\")")or die("-5");
	}
}
*/
echo "correcto";
?>
