---
---
Redovisning
=========================

* [Kmom01](#kmom01)
* [Kmom02](#kmom02)
<!-- * [Kmom03](#kmom03)
* [Kmom04](#kmom04)
* [Kmom05](#kmom05)
* [Kmom06](#kmom06)
* [Kmom10](#kmom10) -->


Kmom01 <a class="float-right header-anchor" href="#kmom01" id="kmom01">#</a>
-------------------------

###Hur känns det att hoppa rakt in i objekt och klasser med PHP, gick det bra och kan du relatera till andra objektorienterade språk?

Att hoppa rakt in i objekt och klasser gick väldigt bra eftersom att även fast det var länge sedan man jobbade med PHP så satt kunskapen fast. Också introguiden hjälpte mig väldigt mycket att få koll på vad det handlar om och jag förstår konceptet ganska tydligt.

I oopython-kursen jobbade vi med liknande kodstrukturer och jag tycker att det underlättade att ha den kunskapen bakom sig för att komma in i den här kursen lättare också. Jag vet inte varför men jag tycker att det var lättare att bygga klasser och objekt i PHP än i Python. Jag antar att jag är mer bekväm i PHP.


###Berätta hur det gick det att utföra uppgiften “Gissa numret” med GET, POST och SESSION?

Till en början fick jag lov att tänka igenom planen ganska mycket eftersom att jag inte gjort detta förut.

Jag fick mycket hjälp av videoserien som jag tittade igenom. Jag försökte att lösa så mycket jag kunde av uppgiften på egen hand men insåg att jag inte riktigt hade kunskapen för att lösa det på en gång. Det var på några ställen jag hade gjort lite fel men när jag rättade till det gick det fort att få det klart.s


###Har du några inledande reflektioner kring me-sidan och dess struktur?

Den är ju uppbyggd på samma sätt som webbsidan i design-kursen. Det enda jag ändrade själv var att jag bygger mina sass-filer med node istället för make. Mest för att jag inte hittade riktigt hur det skulle göras och jag hade precis jobbat med node.js för att bygga en sida så jag använde mig av den istället vilket fungerat väldigt bra. Om det är godkänt eller ej vet jag inte. Oavsett ska jag ta till mig dokumentationen för make för att göra det på rätt sätt vid ett senare tillfälle.


###Vilken är din TIL för detta kmom?

Hur man jobbar med objekt, traits och klasser i PHP var jag inte insatt i så värst mycket. Jag jobbade med klasser i PHP men det var många år sedan så nu är det ett ypperligt tillfälle att lära om sig detta från grunden.


<div id="kmom02"></div>
Kmom02 <a class="float-right header-anchor" href="#kmom02" id="kmom02">#</a>
-------------------------



###Hur gick det att överföra spelet “Gissa mitt nummer” in i din me-sida?

Att köra spelet inifrån me-sidan med hjälp av Anax-ramverket visade sig vara krångligare än vad jag först trodde. Till att börja med gick det lätt att föra över filerna in i en egen mapp jag kunde köra spelet i ensamstående utanför me-sidan. Men när jag skulle skapa vyer och router till spelet såg jag att min mappstruktur skiljde sig avsevärt från den som jag såg i Mikaels instruktionsvideor. 

Till slut fick jag råd i Gitter-chatten och jag lyckades lägga mina filer rätt. I routern fick jag lov att ändra om min sessionshantering av variablerna till att använda Anax inbyggda sessionshanterare " $app->session->" o.s.v. för att få session-versionen av spelet att fungera. 


###Berätta om din syn på modellering likt UML jämfört med verktyg som phpDocumentor. Fördelar, nackdelar, användningsområde? Vad tycker du om konceptet make doc?

Fördelar med phpDocumentor är ju att det blir lite arbete man faktiskt själv behöver göra och kan fokusera på att koda. En klar nackdel är ju att man inte kan börja i den änden utan får generera den efter att man har gjort klart sin kod. Det är också bra med phpdoc eftersom att det ger programmeraren en ytterligare en motivation att föra klara och tydliga kommentarer i koden.

Jag gillar att använda mig av UML och i allmänhet förstudier eller dokumentation innan man sätter igång med arbetet när det rör sig om större kodningsprojekt. Det ger en en tydlig kompass och man vet vad man ska göra. Givetvis behöver inte dessa två - UML och phpdoc - utesluta varandra eftersom att det går att göra båda två vid ett projekt.


###Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?

Jag gillar att skriva kod där man använder sig av ramverk men det förutsätter att man har en god förståelse för ramverket. Nu har vi inte tidigare gjort alltför mycket arbete inom Anax för att ha bra kännedom om alla inbyggda funktioner och objekt i ramverket, men det är förvisso helt och hållet upp till en själv hur mycket man vill ha användning av det.

Som sagt är det bra att skriva kod inuti ramverk när man känner till det för att det ska vara till ens fördel. Skriver man utanför kan det bli en situation av att man uppfinner hjulet varje gång man ska göra en ny uppgift eller ett program. I och med att man måste skapa ny klasser och autoloaders o.s.v. som finns med i de flesta arbeten man gör är det lättare att ha dessa fördefinierade i ramverk.

###Vilken är din TIL för detta kmom?

Att jobba med routers, session och egentligen allmänna saker i Anax-ramverket. Namespace är också något som jag har stött på tidigare och använt mig av utan att förstå till 100%. Nu var det bra att få klarhet i vad den innebär och används till.


<!-- 
Kmom03 <a class="float-right header-anchor" href="#Kmom03" id="Kmom03">#</a>
-------------------------

Kmom04 <a class="float-right header-anchor" href="#kmom04" id="kmom04">#</a>
-------------------------

Kmom05 <a class="float-right header-anchor" href="#kmom05" id="kmom05">#</a>
-------------------------

Kmom06 <a class="float-right header-anchor" href="#kmom06" id="kmom06">#</a>
-------------------------

Kmom07-10 <a class="float-right header-anchor" href="#kmom10" id="kmom10">#</a>
-------------------------
 -->

