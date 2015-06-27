# arena-ill-acq

Axiell använder låntagarens adress i From-fältet. Det är problematiskt, och fungerar inte med Sender Policy Framework.

Det här är ett mycket enkelt PHP-skript för att komma runt det problemet. I [js](js) och [html](html)-mapparna finns exempel på hur PHP-skriptet kan användas från Arena/Liferay eller för den delen något annat.

Konfiguration sker i [arenamejl.ini](php/arenamejl.ini)

Lämpligen läggs PHP-delen på en webbserver hos kommunens IT-avdelning.

Det finns [en film som visar problemet i praktiken](http://jnylin.name/bibl/exempel/arena/epost/)
