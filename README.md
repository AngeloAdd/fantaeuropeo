# Fantapronostico 2021
### Progetto gestito da Angelo Adduci

## ToDo List

<<<<<<< HEAD
### Design di Base Home

=======
<<<<<<< HEAD
### Design di Base Home
=======
### Design di Base
>>>>>>> 41d997995a9d41c54a3ac46b05a0ba778868c5ed
>>>>>>> 91996973afdcdb2289533274ebba25c33a2663d9
* Home page con 4 card: 
    * classifica
    * prossimo match
    * calendario
<<<<<<< HEAD
    * ultimi risultati

=======
<<<<<<< HEAD
    * ultimi risultati


>>>>>>> 91996973afdcdb2289533274ebba25c33a2663d9
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

<<<<<<< HEAD
=======


>>>>>>> 91996973afdcdb2289533274ebba25c33a2663d9
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
<<<<<<< HEAD
=======
=======
    * ultimi risultati
>>>>>>> 41d997995a9d41c54a3ac46b05a0ba778868c5ed
>>>>>>> 91996973afdcdb2289533274ebba25c33a2663d9
