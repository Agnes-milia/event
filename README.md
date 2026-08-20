# Graphql
A GraphQL egy tisztán deklaratív, nyelvfüggetlen adatlekérdező nyelv API-khoz, míg a mögötte lévő logikát (a függvényeket) a szerver oldalon úgynevezett resolver függvényekként kell megvalósítanod.
A GraphQL egyre több modern rendszerben (GitHub, Shopify, Apollo, Hasura stb.) jelenik meg, és jól szemlélteti az API-tervezést.
Laravel környezetben a Lighthouse vagy a GraphQL-Laravel csomagot használva a saját PHP függvényeidet (metódusaidat) a Resolver rétegben vagy egyedi Directive segítségével tudod meghívni.
A GraphQL valójában független az átviteli rétegtől, így a szerver megvalósításához a HTTP-től eltérő protokollok is választhatók.
## Alap logika
Helyes működési elv és elválasztás
•	Séma (SDL): Csak a mezőket és a típusokat deklarálod.
•	Kliens lekérdezés: Csak adatokat kérsz le, paramétereket vagy változókat ($valtozo) adsz át, de kódot nem futtatsz.
•	Szerver oldali logika: A mezőhöz tartozó logikát a szerveren regisztrált resolver köti össze az általad megírt függvénnyel.
Lighthouse-t használok és Graphiql-t a tesztelésre.
