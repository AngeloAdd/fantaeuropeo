# Fantapronostico 2021
### Progetto gestito da Angelo Adduci

## ToDo List


### Design di Base Home

* Home page con 4 card: 
    * classifica
    * prossimo match
    * calendario
    * ultimi risultati







### Database

1. **Lista Squadre**
    * nome della squadra
    * src della bandiera

2. **Lista Calciatori**
    * Nome
    * Cognome
    * foreign della nazionale (relazione one to many)

3. **Lista Partite**
    * Foreign_id squadra casa
    * Foreign id squadra fuori casa
    * Giorno della partita
    * orario della partita
    * numero dell'incontro
    * risultato casa
    * risultato fuori casa
    * segno
    * metodo per il display del tabellino dei gol
    * flag finale (true false)

3. **Pronostico Vincitore**
    * foreign id dell'user
    * foreign_id della squadra vincente
    * importante il timestamp qui

4. **Tavola dei pronostici**
    * risultato casa
    * risultato fuori casa
    * segno
    * Gol casa (nome giocatore, autogol, no goal)
    * Gol fuori casa (nome giocatore, autogol, no goal)
    * timestamp del pronostico
    * foreign dell'user
    * foreign_incontro

### Classifica

* prendere id dell'utente
* prendere numero di entry nella tabella risultati per n°pronostici
* cacolo del numnero di risultati esatti che corrispondono al risultato dell'incontro * 4
* calcolo del numero di segni che corrispondono * 1
* calcolo del numero di gol azzeccati * 2

*gestione classifica*
* Numero di risultati esatti correttamente pronosticati
* Numero di segni 1 X 2 correttamente pronosticati
* Pronostico vincitore indovinato 
* Punteggio ottenuto col pronostico della finale.
* Data e ora al secondo del pronostico della finale.
* ordine alfabetico per cognome


4: {id: 341, name: "Manuel Neuer", position: "Goalkeeper", dateOfBirth: "1986-03-27T00:00:00Z", countryOfBirth: "Germany", …}
10: {id: 3174, name: "Bernd Leno", position: "Goalkeeper", dateOfBirth: "1992-03-04T00:00:00Z", countryOfBirth: "Germany", …}
11: {id: 3175, name: "Kevin Trapp", position: "Goalkeeper", dateOfBirth: "1990-07-08T00:00:00Z", countryOfBirth: "Germany", …}
5: {id: 350, name: "Mats Hummels", position: "Defender", dateOfBirth: "1988-12-16T00:00:00Z", countryOfBirth: "Germany", …}
6: {id: 351, name: "Niklas Süle", position: "Defender", dateOfBirth: "1995-09-03T00:00:00Z", countryOfBirth: "Germany", …}
12: {id: 3176, name: "Matthias Ginter", position: "Defender", dateOfBirth: "1994-01-19T00:00:00Z", countryOfBirth: "Germany", …}
13: {id: 3177, name: "Antonio Rüdiger", position: "Defender", dateOfBirth: "1993-03-03T00:00:00Z", countryOfBirth: "Germany", …}
20: {id: 9472, name: "Christian Günter", position: "Defender", dateOfBirth: "1993-02-28T00:00:00Z", countryOfBirth: "Germany", …}
21: {id: 9479, name: "Robin Koch", position: "Defender", dateOfBirth: "1996-07-17T00:00:00Z", countryOfBirth: "Germany", …}
23: {id: 9536, name: "Lukas Klostermann", position: "Defender", dateOfBirth: "1996-06-03T00:00:00Z", countryOfBirth: "Germany", …}
24: {id: 9538, name: "Marcel Halstenberg", position: "Defender", dateOfBirth: "1991-09-27T00:00:00Z", countryOfBirth: "Germany", …}
0: {id: 47, name: "Toni Kroos", position: "Midfielder", dateOfBirth: "1990-01-04T00:00:00Z", countryOfBirth: "Germany", …}
2: {id: 171, name: "Kai Havertz", position: "Midfielder", dateOfBirth: "1999-06-11T00:00:00Z", countryOfBirth: "Germany", …}
3: {id: 311, name: "Serge Gnabry", position: "Midfielder", dateOfBirth: "1995-07-14T00:00:00Z", countryOfBirth: "Germany", …}
7: {id: 359, name: "Joshua Kimmich", position: "Midfielder", dateOfBirth: "1995-02-08T00:00:00Z", countryOfBirth: "Germany", …}
9: {id: 1847, name: "Robin Gosens", position: "Midfielder", dateOfBirth: "1994-07-05T00:00:00Z", countryOfBirth: "Germany", …}
14: {id: 3181, name: "Leon Goretzka", position: "Midfielder", dateOfBirth: "1995-02-06T00:00:00Z", countryOfBirth: "Germany", …}
15: {id: 3182, name: "Ilkay Gündogan", position: "Midfielder", dateOfBirth: "1990-10-24T00:00:00Z", countryOfBirth: "Germany", …}
19: {id: 6681, name: "Jonas Hofmann", position: "Midfielder", dateOfBirth: "1992-07-14T00:00:00Z", countryOfBirth: "Germany", …}
22: {id: 9522, name: "Florian Neuhaus", position: "Midfielder", dateOfBirth: "1997-03-16T00:00:00Z", countryOfBirth: "Germany", …}
25: {id: 144393, name: "Jamal Musiala", position: "Midfielder", dateOfBirth: "2003-02-26T00:00:00Z", countryOfBirth: "Germany", …}
16: {id: 3183, name: "Emre Can", position: "Midfielder", dateOfBirth: "1994-01-12T00:00:00Z", countryOfBirth: "Germany", …}
1: {id: 150, name: "Kevin Volland", position: "Attacker", dateOfBirth: "1992-07-30T00:00:00Z", countryOfBirth: "Germany", …}
8: {id: 370, name: "Thomas Müller", position: "Attacker", dateOfBirth: "1989-09-13T00:00:00Z", countryOfBirth: "Germany", …}
17: {id: 3184, name: "Leroy Sané", position: "Attacker", dateOfBirth: "1996-01-11T00:00:00Z", countryOfBirth: "Germany", …}
18: {id: 3187, name: "Timo Werner", position: "Attacker", dateOfBirth: "1996-03-06T00:00:00Z", countryOfBirth: "Germany", …}
26: {id: 10178, name: "Joachim Löw", position: null, dateOfBirth: "1960-02-03T00:00:00Z", countryOfBirth: "Germany", …}
27: {id: 43800, name: "Andreas Köpke", position: null, dateOfBirth: "1962-03-12T00:00:00Z", countryOfBirth: "Germany", …}
28: {id: 136064, name: "Marcus Sorg", position: null, dateOfBirth: "1965-12-24T00:00:00Z", countryOfBirth: "Germany", …}
