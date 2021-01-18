# Stawianie środowiska i konfiguracja | Dokumentacja
--
- Pobieranie repozytorium
--
Aby pobrać projekt, należy w konsoli wejść do katalogu `htdocs/` znajdującego się w katalogu `xampp/`.
Należy wykonać komendę `git clone https://github.com/JakubLem/wholesaler-school-project.git`

Następnie wchodzimy w folder `wholesaler-school-project/` komendą: 
```cd wholesaler-school-project```


--
- Stawianie wirtualnego środowiska pod Django
--

W tym momencie należy się upewnić czy zainstalowany jest python wykonując komendę: `python --version`
Jeśli w konsoli nie pojawi się błąd możemy przejść dalej.

Należy wykonać komendę: `python -m venv venv`
Następnie należy uruchomić wirtualne środowisko:

MAC/Linux: `source venv/bin/activate`
Windows: `venv\Scripts\activate`

Po uruchomieniu środowiska przed ścieżką powinnna się pojawić jego nazwa `(venv)`, 
następnie należy zainstalować potrzebne pakiety komendą:

`pip install -r requirements.txt`

Aby uruchomić aplikację Django należy wykonać komendę:

`python core/pycore/manage.py runsesrver`
--
- Uruchamianie projektu:
--
Należy uruchomić usługi w XAMPP Control Panel:
- Apache
- MySQL

W przeglądarce należy wpisać link: `localhost/wholesaler-school-project/`

--
- Zamknięcie aplikacji:
--

1. Należy wyłączyć usługi
