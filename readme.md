# Zadanie rekrutacyjne dla olicom

## Jak uruchomić

```
$ symfony local:server:ca:install
$ symfony local:server:start
```

- Informacje na temat repozytorium
```
GET https://127.0.0.1:8000/v1/repositories/symfony/symfony
```

- Informacje na temat użytkownika
```
GET https://127.0.0.1:8000/v1/users/fabpot
```

## Założenia i zastosowane podejście.
- Zadanie stricte opiera się na pozyskiwaniu GitHubowych
- Jest to proxy na GitHuba gdzie stworzyliśmy sobie miejsce na ewentualne zapisywanie i customową politykę keszowania.
- Nie przejmuję się limitami odpytań w tym zadaniu.

---
Zastosowałem podział na komponenty, przez co od razu widać czym zajmuje się aplikacja.
Mamy przeglądarkę GitHuba, z dwoma prezentacjami i fasadą będącą kontraktem dla przyszłego api dla ewentualnego mikroserwisu.
Podejście to umożliwia dość prosty przeskok w stornę architektury portów i adapterów/heksagonalną.

Rzeczy które bym dodał od siebie to testy architektury z wykorzystaniem deptrace.
Ale tak naprawdę chciałbym przejść kilka iteracji by dowiedzieć się w którą stronę aplikacja będzie się rozwijać.


## todo:
### Testy e2e
W procesie CI, np jenkins / Gitlab CI (To narzędzia z których korzystałem najwięcej)
Należy przygotować proces deploymentu nowego kodu na maszynę ze środowiska
testowego. Testy można przygotować za pomocą frameworka wspierającego
przygotowywanie testów selenium.
W naszym wypadku wystarczyłby testy PHPUnita z wykorzystaniem crawlera.
Ponieważ nie korzysamy z js'a.

### Testy obciążeniowe
Przy użyciu JMetera, przygotować dwa testy (dla endpointów) pobierające dane
i uruchomić na x wątkach. Testy mogą odbywać się na środowisku produkcyjnym,
o ile mamy "noc", ale środowisko testowe też jest dobrym miejscem na takie testy.
Takie testy też warto zautomatyzować.

### Wdrożenie
W zależnośći od infrastruktury w firmie, możemy wykorzystać jedną z wielu dostępnych możliwośći.
Tutaj wymienie kilka których używałem i przejdę do innych sugesti.
- Narzędzie deployer i deployment na znanych nam maszynach w modelu push
- Przygotowanie skryptu bashowego dla deploymentu w modelu pull.

Te dwa zawsze robiły robotę :)

Nie miałem okazji korzystać produkcyjnie z dockera, żeby przygotować taką formę
musiałbym poświęcić kilka godzin na zapoznanie się z tym.

Patrząc na prostotę działania tego serwisu. Skłoniłbym się jeszcze ku wykorzystaniu narzędzi udostępnionych przez AWS
jak AWS LAMBDA i konkurencyjnego Azure Functions. Umożliwi to prostą skalowalność per request.
