---
---
Redovisning
=========================

* [Kmom01](#kmom01)
* [Kmom02](#kmom02)
* [Kmom03](#kmom03)
* [Kmom04](#kmom04)
<!--* [Kmom05](#kmom05)
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


Kmom03 <a class="float-right header-anchor" href="#kmom03" id="kmom03">#</a>
-------------------------



###Har du tidigare erfarenheter av att skriva kod som testar annan kod?

Ja, i kursen oopython gjorde vi både klasser och enhetstestning på klasserna. Det fungerade på ett liknande sätt som vi gjorde tester i det här kursmomentet. Utöver det har jag inte gjort mycket enhetstester.

###Hur ser du på begreppen enhetstestning och att skriva testbar kod?

Det känns som en logisk förlängning i att skapa kod som är som ett API ut mot användaren. Om klassernas metoder är tydliga vad de gör och uppdelade i lagom stora metoder, är det lättare att göra enhetstestning på koden. I detta kursmomentet var det svårt att skriva 100% testbar kod och jag hade lite problem med att testa alla funktioner. Jag ser nu lite grann hur jag skulle kunna skriva om koden för att den ska vara mer testbar. Dela upp metoderna i fler och mindre metoder för att kunna testa varje del i enhetstestningen hade gjort det lättare att kontrollera testfallen.

###Förklara kort begreppen white/grey/black box testing samt positiva och negativa tester, med dina egna ord.

White box testning är när testaren känner till koden och har tillgång till den och på så sätt kan skapa utförliga tester baserat på vad som finns i koden. Med black box testning menas att testaren inte har tillgång till koden utan enbart ett API som kan kalla på metoder. I och med det kan testaren enbart förhålla sig till det officiella API:t som tillhandahålls och svaren som metoderna ger med olika argument. Gray bos testning är en kombination av dessa när testaren har en aning om kodens innehåll och kan förhålla sig till den men testar med hjälp av dokumentationen som finns tillgänglig för testare.

Min uppfattning är att positiva tester är när testaren gör testfall där svaret av en metod eller funktion ska stämma överens med ett testvärde. Ett negativt test är å andra sidan när en testvärde inte ska stämma överens med testfallet eller att testfallet ska orsaka ett fel eller undantag.

###Berätta om hur du löste uppgiften med Tärningsspelet 100, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?

Jag använde mig av de klasser jag fick från tidigare kursmoment "Dice", "DiceHand" och "DiceGraphic". Senare skapade jag ytterligare två klasser "Player" och "Game". Klassen "Player" hanterar spelarobjekten, håller koll på varje spelares poäng och ordning. Klassen "Game" sköter resten av spelets funktioner som att hantera vad som ska hända när en spelare kastat tärning, kollar ifall spelare har vunnit eller generera datorns tärningskast.

I routern har jag två fall: "POST" och "GET". Görs en post till routern har någon handling utförts i spelets gränssnitt och en funktion ska köras. Routern skickar vidare, beroende på vilka värden POST har. Efter varje funktionsanrop förs användaren tillbaka till startsidan. Görs ett GET-anrop läses sessionen ut där alla instanser av mina klasser ligger och gränssnittet skrivs ut på sidan.

Min tanke var att ha en övergripande planering och mall för hur spelet kunde se ut med klasser, funktionalitet o.s.v. Det som tog det mesta av tiden var att göra enhetstesterna samt att buggtesta spelet. När jag rättade till en bugg kom det upp fler följdfel som jag fick lov att lösa genom att göra om delar av spelet, ändringar jag inte hade haft utrymme för i planeringen.

###Hur väl lyckades du testa tärningsspelet 100?

Det gick ganska bra. Jag fick en god kodtäckning, över 80%, men jag lyckades inte få alla funktioner att returnera alla möjliga fall. Det var svårt att skapa en testmiljö för de större metoderna som var svåra att dela upp i mindre delar. Jag kämpade med att få kodtäckningen så högt jag kunde och jag är nöjd med resultatet. Det känns som en bra del att ha med i framtida projekt och program.

###Vilken är din TIL för detta kmom?

Jag lärde mig om vad kommentarer i php-filerna genererar för resultat vid make doc och hur viktigt det är att de är korrekt skrivna. Också att skriva metoder i klasser som underlättar enhetstestning var något jag fick kunskap om. Att det blir en mer överskådlig och lätthanterlig kod om man förhåller sig till att man ska enhetstesta från första början.




Kmom04 <a class="float-right header-anchor" href="#kmom04" id="kmom04">#</a>
-------------------------

###Vilka är dina tankar och funderingar kring trait och interface?

Interface är fortfarande oklarare för mig än trait. Trait fungerar och upplevs precis som jag tror och var lätt att jobba med. Jag behöver läsa på mer om interface innan jag kan använda det med stor säkerhet i kod. Trait använde jag mig mycket av, till exempel för att komma över varningen jag fick att jag hade för många metoder i min Game-klass. Då flyttade jag ut vissa metoder i Traits med passande kategorier och läste in dessa till huvudklassen.

###Hur gick det att skapa intelligensen och taktiken till tärningsspelet, hur gjorde du?

Jag hade redan en liten intelligens i spelets förra version men den här gången utvidgade jag den och blev väldigt nöjd med resultatet. Logiken tar hänsyn till antal tärningar, nuvarande poäng, ledande spelarens poäng, närhet till att själv vinna, ifall mycket poäng har samlats in redan och ifall en genomsnittlig tärningshand till skulle räcka för att vinna.

###Några reflektioner från att integrera hårdare in i ramverkets klasser och struktur?

Jag använde en del av ramverkets inbyggda funktioner och klasser i förra kursmomentet och behövde inte ändra allt för mycket för att nå kravet. Något jag kunde göra som jag märkte att Mikael hade gjort i sitt exempel var att dela upp alla post-ärenden till olika routes, medan jag separerar dom i en generell POST-route på knapparnas värde.

###Berätta hur väl du lyckades med make test inuti ramverket och hur väl du lyckades att testa din kod med enhetstester och vilken kodtäckning du fick.

Jag fick hög kodtäckning på de klasser jag skapade till spelet, 98.70 %, och försökte få med varje funktion i varje klass. Enda anledningen till att jag inte lyckades få 100% beror på funktioner med möjlighet till slumpmässiga utfall vilket resulterar i att ibland täcker koden en del och ibland en annan. Jag skulle kanske få 100% kodtäckning om jag till exempel skulle göra runt 10000 assertions på min computerRoll-funktion, men det känns inte helt rätt. Jag vet inte för övrigt hur man ska testa funktioner med högt CRAP-index, men är nöjd med kodtäckningen jag har utan de resterande funktionerna.

###Vilken är din TIL för detta kmom?

Logik i datorspelares intelligens var något jag fick fundera länge på och undersöka vad bästa vägen att gå var. Också att använda sig av histogram och visa upp det på bästa sätt var något nytt att handskas med.


<!-- 
Kmom05 <a class="float-right header-anchor" href="#kmom05" id="kmom05">#</a>
-------------------------

Kmom06 <a class="float-right header-anchor" href="#kmom06" id="kmom06">#</a>
-------------------------

Kmom07-10 <a class="float-right header-anchor" href="#kmom10" id="kmom10">#</a>
-------------------------
 -->

