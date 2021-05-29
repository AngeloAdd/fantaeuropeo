# Fantapronostico 2021
### Progetto gestito da Angelo Adduci

## ToDo List

### Lista Rosa e Team
* json in storage
* token di autenticazione per poter accedere ai dati
* costruzione dell'api

### Database

1. **Match Table**
    * id
    * squadra home
    * squadra away
    * risultato home
    * risultato away
    * segno 1/x/2
    * home tabellino
    * away tabellino

2. **Pronostico Vincitore**
    * foreign id dell'user
    * Nome della squadra vincente
    * importante il timestamp qui

3. **Tavola dei pronostici**
    * risultato casa
    * risultato fuori casa
    * segno
    * Gol casa (nome giocatore, autogol, no goal)
    * Gol fuori casa (nome giocatore, autogol, no goal)
    * timestamp del pronostico
    * foreign dell'user
    * foreign_incontro

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
    * ### Classifica:
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


3. **infogafica prossimo match**
    * il match più vicino viene visualizzato in home e puoi cliccare sul bottone per andare alla pagina dei pronostici

4. **Calendario**
    * preview in home stile google con numero tot di match
    * infografica generale con struttura gironi e 8
        * se riesco creao una logica per cui le classifiche per girno e la fase ad eliminazione si riemapiano da sole (lungo non difficile)





### Design di Base Home

* Home page con 4 card: 
    * classifica
    * prossimo match
    * calendario
    * ultimi risultati

### Pannello di controllo
* gestione degli user
* inserimento risultati partite

### Infografica calendario
* inserimento della classifica per girone
* fase ad 8 da gestire 
