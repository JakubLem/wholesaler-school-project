# wholesaler-school-project

Projekt powstaje w celach szkolnych
Autor: Jakub Lemiesiewicz

Tablica Trello: https://trello.com/b/v95LHnUI/wholesaler-school-project
Repozytorium: https://github.com/JakubLem/wholesaler-school-project

# Konfiguracja środowiska:

`./docs/venv.md`
https://github.com/JakubLem/wholesaler-school-project/blob/main/docs/venv.md

# Pełna dokumentacja projektu:
`./docs/dokumentacja_techniczna.docx`

# Dokumentacja ogólna:

1. Tematyka projektu:

    Projekt ma na celu wspomaganie pracy w hurtowni, będzie umożliwiał zarządzanie zasobami – produktami, możliwe będzie prowadzenie spisu produktów zamówionych przez Internet oraz stacjonarnie. Wszystko będzie się logicznie łączyło z pracownikami hurtowni oraz klientami. 

	Administratorzy (pracownicy) będą mogli umieszczać hurtowo różne produkty od producentów. Administratorzy będą mieli różne rodzaje uprawnień, co będzie się dynamicznie przekładało na wykonywanie przez nich zmian na stronie.

	Klienci będą mogli kupować jednocześnie przez Internet jak i zamawiać telefonicznie, konieczne będzie jednak podanie adresu NIP firmy.


2. Diagram przypadków użycia

3. Opis techniczny projektu

	Projekt będzie oparty o język php, czysty bez frameworka, aplikacja będzie wspomagana przez stojącą obok aplikację django – która będzie odpowiadała za pojedyncze mechanizmy.

	Pod kątem logistycznym, rozwijanie projektu będzie oparte o tablicę na Trello (https://trello.com/b/v95LHnUI/wholesaler-school-project), projekt jest umieszczony na githubie (https://github.com/JakubLem/wholesaler-school-project). Jeden i drugi link jest publiczny.

	Wykorzystywane języki:
	- HTML
	- CSS
	- JS
	- PHP
	-PYTHON

	Baza danych:
	- MySQL PHPMyAdmin

4. Potencjalne możliwe problemy i zagrożenia (do części technicznej)

	- problemy z uploaadem plików
	- problemy z synchronizacją z aplikacją Django jeśli ta będzie miała jakieś problemy


5. Spis tabel bazy danych

	Relacyjny model danych dostępny pod linkiem: https://drive.google.com/file/d/19kNLh2lUhutytPCfPZtXUAb3WlBdsxBY/view?usp=sharing

	Tabele bazy danych:

	- static_data
	- ordered_products
	- products
	- manufacturers
	- orders
	- clients
	- administrators
	- users
	- online_orders
	- stationary_orders
	- firm
