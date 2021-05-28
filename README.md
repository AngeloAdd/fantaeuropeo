# Fantapronostico 2021
### Progetto gestito da Angelo Adduci

## ToDo List

### Design di Base Home

* Home page con 4 card: 
    * classifica
    * prossimo match
    * calendario
    * ultimi risultati

### Gestione dei dati
1. **Lista squadre e Team**
    * json in storage 

2. **lista dei match**
    * probabile un altro json con i match e il timestamp preciso

## Obbiettivi

1. **Poter inserire un pronostico**
    * Visualizzazione del match più vicino diretta più quelli della giornata
    * dettaglio del pronostico match:
        * inserimento risultato esatto
        * inserimento segno con infografica -> seganlata la squadra di cui si proostica la vittoria
        * radio con tre opzioni 
            * autogol
            * nogoal
            * giocatore
        * in caso di scelta di giocatore form che appare e scompare:
            * visualizzazione delle rose delle due squadre con possibilità di cliccare sul giocatore scelto
            * possibilità di annulare la scelta del giocatore 
        * cliccare su inserimento pronostico permette di generare una entri
            * questa entry nel database può essere modificata ma non cancellata e presenta un updated at che farà fede.

2. **Classifica**
    * la classifica preview in home
    * la classifica generale in classifica con la possibilità di ordinare per punti
    * *opzionale possibilità di ordinare per altre robe*

3. **infogafica prossimo match**
    * il match più vicino viene visualizzato in home e puoi cliccare sul bottone per andare alla pagina dei pronostici

4. **Calendario**
    * preview in home stile google con numero tot di match
    * infografica generale con struttura gironi e 8
        * se riesco creao una logica per cui le classifiche per girno e la fase ad eliminazione si riemapiano da sole (lungo non difficile)

### Database

1. **Pronostico Vincitore**
    * foreign id dell'user
    * Nome della squadra vincente
    * importante il timestamp qui

2. **Tavola dei pronostici**
    * risultato casa
    * risultato fuori casa
    * segno
    * Gol casa (nome giocatore, autogol, no goal)
    * Gol fuori casa (nome giocatore, autogol, no goal)
    * timestamp del pronostico
    * foreign dell'user
    * foreign_incontro

3. **tavola degli incontri**
    * squadra casa
    * squadra fuori casa
    * risultato casa
    * risultato fuori casa
    * segno
    * tabellino in un array

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

### Pannello di controllo
* gestione degli user
* inserimento risultati partite

### Infografica calendario
* inserimento della classifica per girone
* fase ad 8 da gestire 
