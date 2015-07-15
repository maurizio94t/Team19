-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Lug 15, 2015 alle 17:09
-- Versione del server: 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ApuliaGo`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Prenotazioni`
--

CREATE TABLE `Prenotazioni` (
  `Cod` int(5) NOT NULL,
  `DataP` date NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `CF` varchar(16) NOT NULL,
  `DataN` date NOT NULL,
  `Tel` varchar(12) NOT NULL,
  `DataI` date NOT NULL,
  `DataF` date NOT NULL,
  `CodPt` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `PuntiDiInteresse`
--

CREATE TABLE `PuntiDiInteresse` (
  `Cod` int(3) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Descrizione` text NOT NULL,
  `Img` varchar(50) NOT NULL,
  `Categoria` varchar(3) NOT NULL,
  `Latitudine` double NOT NULL,
  `Longitudine` double NOT NULL,
  `Prezzo` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `PuntiDiInteresse`
--

INSERT INTO `PuntiDiInteresse` (`Cod`, `Nome`, `Descrizione`, `Img`, `Categoria`, `Latitudine`, `Longitudine`, `Prezzo`) VALUES
(1, 'Agriturismo Murà', 'L’agriturismo Murà, presso la Masseria San Domenico, a circa 8 Km da Cassano delle Murge e a 11 da Altamura, sorge in zona rurale rientrante nel Parco Nazionale dell’Alta Murgia, in contrada Sgolgore. Trae il nome dai numerosi muretti a secco presenti nella zona. Nasce dalla ristrutturazione degli edifici preesistenti opportunamente convertiti in strutture ricettive provviste di ogni confort in grado di offrire, a chi ama vivere a contatto con la natura, un soggiorno piacevole, indimenticabile, imperdibile. Murà con la sua zona circostante offre al visitatore l’armonia e l’incanto del tipico paesaggio murgiano caratterizzato da ondulazioni e avvallamenti dove a spazi destinati a pascolo e a seminativi si alternano macchie di vegetazione ricca di numerose specie spontanee e di fauna tipica della Murgia. Nelle immediate vicinanze, a circa 300 metri, percorribili a piedi, in mountainbike e a cavallo, si trova la bellissima Foresta di Mercadante. Murà offre piatti della cucina tipica locale, stanze per pernottamento, pensione per cavalli e maneggio.', 'imgAttrazioni/Agriturismo.jpg', 'CB', 40.857374, 16.687868, 60),
(2, 'Alberobello', 'Alberobello è un comune italiano di circa 11.000 abitanti della città metropolitana di Bari, in Puglia, al centro della Valle d''Itria e della Terra dei Trulli.\r\nCelebre per le sue caratteristiche abitazioni chiamate trulli che, dal 1996, sono patrimonio dell''umanità dell''UNESCO, fa parte della Valle d''Itria.\r\nLa storia di questi edifici molto particolari è legata a un editto del Regno di Napoli che nel XV secolo sottoponeva ad un tributo ogni nuovo insediamento urbano. I conti di Conversano, proprietari del territorio su cui sorge oggi Alberobello, imposero allora ai contadini inviati in queste terre di edificare a secco, senza utilizzare malta, le loro abitazioni, in modo che esse potessero configurarsi come costruzioni precarie, di facile demolizione.\r\nDovendo quindi utilizzare soltanto pietre, i contadini trovarono nella forma rotonda con tetto a cupola autoportante, composto di cerchi di pietre sovrapposti, la configurazione più semplice e solida. I tetti a cupola dei trulli sono abbelliti con pinnacoli decorativi, la cui forma è ispirata a elementi simbolici, mistici e religiosi.', 'imgAttrazioni/Trulli_Alberobello.jpg', 'ESP', 40.786478, 17.239789, 39),
(3, 'Grotte di Castellana', 'Le Grotte di Castellana sono un complesso di cavità sotterranee di origine carsica di interesse speleologico e turistico, situato nel comune italiano di Castellana Grotte, in Puglia.\r\nAnnesso al complesso vi è un museo speleologico.\r\nLe grotte di Castellana, estese per circa 3 chilometri, si aprono a 330 m s.l.m. a 1800 metri dall''abitato di Castellana Grotte, sull''altopiano carsico delle Murge sud orientali che si formò nel Cretaceo superiore circa novanta - cento milioni di anni fa. L''intero territorio comunale è caratterizzato da rocce calcaree composte essenzialmente da carbonato di calcio, prevalentemente del tipo calcare di Altamura.\r\nLa storia della Grave inizia nel Cretaceo superiore (novanta-cento milioni di anni fa), quando la Puglia era sommersa da un antico mare, nel quale vivevano vaste colonie di molluschi e vegetali marini. Per milioni di anni generazioni e generazioni di queste forme di vita si erano succedute le une alle altre e, morendo, i loro gusci svuotati e le loro carcasse si erano accumulati sul fondo del mare, formando un gigantesco deposito di fango e di sabbia, che con il suo lento ma continuo accrescimento si era via via compresso, fino a formare uno strato di calcare dello spessore di diversi chilometri.', 'imgAttrazioni/Grotte.jpg', 'ESP', 40.875926, 17.148436, 16.5),
(4, 'Calderoni Resort', 'Il Calderoni Martini Resort è situato nel cuore del Parco Nazionale dell’Alta Murgia, in uno scenario naturalistico di incontaminata bellezza. \r\nIl progetto del Resort prende vita da un’antica masseria costruita oltre cinquecento anni fa ad opera delle prestigiose famiglie Calderoni e Martini. \r\nLa dimora storica fu in seguito residenza esclusiva della nobile famiglia Santommasi ed oggi conserva ancora elementi di pregio storico e artistico del VII secolo. L’attento lavoro di recupero iniziato nel 2007 ha portato la residenza al suo antico splendore. Un’architettura d’avanguardia ha completato il progetto del Resort reinterpretando ogni elemento naturalistico e storico dell’ambiente nativo. Sono stati realizzati nuovi spazi caratterizzati da uno stile moderno ed eclettico. Originali accostamenti di forme contemporanee e simmetrie classiche fanno da cornice ai singolari elementi d’arredo, il frutto di una accurata ricerca estetica. Il Resort è un luogo di ospitalità raffinata e cordiale. Il servizio si caratterizza per elevati standard di qualità e professionalità. \r\nOgni aspetto della gestione è considerato in funzione dell’ospite, della sua soddisfazione e delle sue aspettative.  ', 'imgAttrazioni/Calderoni.jpg', 'CB', 40.870807, 16.459547, 19.35),
(5, 'Castel Del Monte', 'Castel del Monte è un edificio del XIII secolo fatto costruire dall''imperatore Federico II in Puglia, nell''attuale frazione omonima del comune di Andria, a 18 km dalla città, nei pressi della località di Santa Maria del Monte, in provincia di Barletta-Andria-Trani.\r\n È situato su una collina della catena delle Murge occidentali, a 540 metri s.l.m.\r\n È stato inserito nell''elenco dei monumenti nazionali italiani nel 1936 e in quello dei patrimoni dell''umanità dell''UNESCO nel 1996.\r\n L''origine dell''edificio si colloca ufficialmente il 29 gennaio 1240, quando Federico II Hohenstaufen ordinò a Riccardo da Montefuscolo, Giustiziere di Capitanata, che venissero predisposti i materiali e tutto il necessario per la costruzione di un castello presso la chiesa di Sancta Maria de Monte (oggi scomparsa). Questa data, tuttavia, non è accettata da tutti gli studiosi: secondo alcuni, infatti, la costruzione del castello in quella data era già giunta alle coperture.\r\n L''edificio è a pianta ottagonale (lato esterno: 10,30 m intervallo tra le torri più diametro di ogni torre: 7,90 m) e a ogni spigolo si innesta una torretta a sua volta ottagonale (lato 2,70 m), mentre l''ottagono che corrisponde alla corte interna ha lati la cui misura varia tra i 6,89 m e i 7,83 m. \r\n Lo spazio interno è suddiviso in due piani, rialzati rispetto al piazzale antistante di 3 e 9,5 metri rispettivamente. Le stanze, trapezoidali, sono divise da muri che congiungono gli spigoli dell''ottagono interno e gli spigoli di quello esterno, dove si impostano le omologhe torri.', 'imgAttrazioni/Castello.jpg', 'ESP', 41.084551, 16.271084, 10),
(6, 'Basilica', 'La basilica di San Nicola nel cuore della città vecchia di Bari, è uno dei più fulgidi esempi di architettura del romanico pugliese. Fu costruita in stile romanico tra il 1087 e il 1100, durante la dominazione normanna. L''edificazione della basilica è legata alle reliquie di san Nicola, traslate, per la parte più appariscente, da sessantadue marinai baresi dalla città di Myra, in Licia, e giunte a Bari il 9 maggio 1087.\r\nLe reliquie vennero ospitate provvisoriamente presso il monastero di san Benedetto retto dall''abate Elia, il quale promosse subito l''edificazione di una nuova grande chiesa per ospitarle. Fu scelta l''area che sino a pochi anni prima aveva ospitato il palazzo del catapano, (governatore) bizantino, distrutto durante la ribellione per le libertà comunali e che Roberto il Guiscardo aveva donato l''anno prima all''arcivescovo Ursone; i lavori furono avviati a luglio dello stesso anno. Il 1º ottobre 1089 le reliquie furono trasferite nella cripta della basilica da papa Urbano II giunto appositamente a Bari.\r\nLa facciata a salienti, semplice e maestosa, è tripartita da lesene, coronata da archetti e aperta in alto da bifore e in basso da tre portali, dei quali il mediano, a baldacchino su colonne, è riccamente scolpito. Due torri campanarie mozze, di diversa fattura, fiancheggiano la facciata. I fianchi si caratterizzano per le profonde arcate cieche (sopra le quali corrono loggette a esafore) e le ricche porte. ', 'imgAttrazioni/Basilica.jpg', 'ESP', 41.130342, 16.870159, 21.9),
(7, 'Masseria', 'La Masseria Papaperta costruita nel 1700 è localizzata in una zona geografica denominata Murgia a pochi, chilometri da Castellana Grotte ed i trulli di Alberobello.\r\nLa Masseria Papaperta circondata dal verde, conserva intatti tutti i manufatti che i contadini con una laboriosa opera di bonifica hanno realizzato tagliando le quercie e dissodando le pietre.\r\nIn particolare i visitatori potranno ammirare i parieti, muretti a secco utilizzati per delimitare i confini e contenere i terreni in pendenza, le aie, spiazzi per la lavorazione dei cereali, gli iazzi, ricoveri all’aperto per gli animali, le foggie, cisterne per la raccolta dell’acqua piovana, i lamioni, costruzioni con volta a botte per il deposito della paglia, ed in fine i fabbricati rurali utilizzati perl’alloggio del massaro.\r\nSono manufatti che, utilizzando la grande quantità di pietre presenti, hanno trasformato il paesaggio agrario conferendo caratteristiche architettoniche uniche.\r\nLa Masseria Papaperta è parte integrante di un vasto podere dove è possibile osservare grandi esemplari di Quercus Troiana W. ed altre piante tipiche della macchia mediterranea.\r\nLa masseria storica conserva alcuni ambienti intatti dell’epoca interamenti costruiti a secco senza l’uso di malta ed è privo di barriere architettoniche. ', 'imgAttrazioni/Masseria.jpg', 'CB', 40.823271, 17.194284, 19.99),
(8, 'Teatro Petruzzelli', 'Il Teatro Petruzzelli, di proprietà della famiglia Messeni Nemagna, è il maggiore teatro della città metropolitana di Bari, il quarto teatro italiano per dimensioni e il più grande teatro privato d''Europa.\r\nUbicato nel pieno centro della città, si affaccia su Corso Cavour. Sulla sua parete a sud finisce via De Giosa, alle spalle il palazzo dell''Acquedotto Pugliese.\r\nLa storia del Teatro Petruzzelli di Bari ha inizio quando Onofrio e Antonio Petruzzelli, commercianti e armatori di origine triestina, presentarono presso la sede comunale di Bari la progettazione del teatro dell''ingegnere bitontino Angelo Cicciomessere (poi Messeni), marito della loro sorella Maria. La proposta dei Petruzzelli venne accettata e nel 1896 stipulato il contratto tra la famiglia e l''amministrazione comunale. Il contratto porta la data del 29 gennaio 1896. Con quel contratto il comune di Bari cedeva il suolo in uso perpetuo ai Petruzzelli perché vi edificassero un politeama. Due anni dopo, nell''ottobre 1898, cominciarono i lavori finanziati esclusivamente dalla famiglia proprietaria, che terminarono nel 1903. Internamente il teatro fu affrescato da Raffaele Armenise, decorato in oro zecchino e, cosa avveniristica per l''epoca, dotato di riscaldamento e luce elettrica per una capienza di 2.192 posti. Il Petruzzelli tolse a Corato il primato del più grande teatro di Puglia. Fu inaugurato sabato 14 febbraio 1903 con il capolavoro di Meyerbeer, Gli Ugonotti. ', 'imgAttrazioni/Petruzzelli.jpg', 'SV', 41.123592, 16.873147, 15),
(9, 'Tour in Barca', 'Viaggerete con Le Terre di Federico che vi propone escursioni in barca, con guida turistica a bordo, su caicco oppure pescaturismo lungo la bella costa pugliese.\r\nL''associazione con sede a Trani, dal cui porto sono previsti gli imbarchi per le escursioni lungo il litorale, è specializzata nell''organizzazione di escursioni turistiche guidate, tutte ad opera di un preparato staff multilingue di accompagnatori accreditati dalla regione Puglia.\r\nLe proposte di Le Terre di Federico spaziano però anche nell''entroterra, con trekking e cicloturismo nelle più belle località di Puglia e Basilicata, nei sentieri del Parco Nazionale dell''Alta Murgia.\r\nLe uscite sono cucite sulle esigenze del gruppo in escursione tanto per gli itinerari come per la durata, e possono essere effettuate con accompagnatori di lingua italiana, inglese, francese, spagnola, tedesca e russa. ', 'imgAttrazioni/Barca.jpg', 'SV', 41.243666, 16.381702, 49.99),
(10, 'Tour in Bici', 'Viaggerete con Ruotalibera. Nasce a Bari il 4 ottobre del 1990 per promuovere e sviluppare l’uso della bicicletta, quale mezzo di trasporto semplice, economico e non inquinante, utile alla riduzione del traffico urbano all’interno di un sistema di trasporti integrati.\r\nInoltre ricerca itinerari sicuri da percorrere in bicicletta e aderisce alla FIAB, Federazione Italiana Amici della Bicicletta. \r\nPossibilita'' di scelta del percorso a piacere del cliente!', 'imgAttrazioni/Bike.jpg', 'SV', 41.116144, 16.875669, 15);

-- --------------------------------------------------------

--
-- Struttura della tabella `Utenti`
--

CREATE TABLE `Utenti` (
  `id_utente` int(4) NOT NULL,
  `nome_utente` varchar(20) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `nome_reale` varchar(50) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Utenti`
--

INSERT INTO `Utenti` (`id_utente`, `nome_utente`, `password`, `nome_reale`, `email`) VALUES
(1, 'io', '5a258230180d9c643f761089d7e33b8b52288ed3', 'io', 'io@ioioio.com'),
(4, 'Giupy', '1e4e888ac66f8dd41e00c5a7ac36a32a9950d271', 'Giuseppe', 'giuseppe@cicio@live.it');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Prenotazioni`
--
ALTER TABLE `Prenotazioni`
  ADD PRIMARY KEY (`Cod`),
  ADD KEY `CodPt` (`CodPt`);

--
-- Indexes for table `PuntiDiInteresse`
--
ALTER TABLE `PuntiDiInteresse`
  ADD PRIMARY KEY (`Cod`);

--
-- Indexes for table `Utenti`
--
ALTER TABLE `Utenti`
  ADD PRIMARY KEY (`id_utente`),
  ADD UNIQUE KEY `username` (`nome_utente`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Prenotazioni`
--
ALTER TABLE `Prenotazioni`
  MODIFY `Cod` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `PuntiDiInteresse`
--
ALTER TABLE `PuntiDiInteresse`
  MODIFY `Cod` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Utenti`
--
ALTER TABLE `Utenti`
  MODIFY `id_utente` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Prenotazioni`
--
ALTER TABLE `Prenotazioni`
  ADD CONSTRAINT `prenotazioni_ibfk_1` FOREIGN KEY (`CodPt`) REFERENCES `PuntiDiInteresse` (`Cod`);
