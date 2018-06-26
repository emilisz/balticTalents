## Užduotis


* Registruotis gali tik users, kurie zino admin(mokytojo) slaptazodi.

* Studentai gali prisijungti tik gave prieiga is destytojo.

* Studentas gautas zinutes mato tik iejes i grupe

 
 
 
#### Praktinė užduotis ####
##### Tikslas #####
Sukurti užsakovui:  mokomosios medžiagos talpinimui skirtą sistemą, kurioje dėstytojas galėtų pateikti mokomąją medžiagą (failus), o studentai galėtų prisijungę ją parsisiųsti.
### Visos sistemos veikimo principai: ###
* Visi vartotojai (dėstytojai ir studentai) talpinami vienoje duomenų bazės lentelėje (lentelė vartotojai) kurioje turi būti laukas nusakantis kokio tipo šis vartotojas: dėstytojas ar studentas (gali būti int tipo, tuomet tarkime 1 – dėstytojas, 2 – studentas). 
* Dėstytojas turėtų turėti galimybę kurti atskirus kursus (lentelėje kursai, pavyzdžiui „PHP“, „Frontend“, „UX/UI“ ir kt.). Tuomet dėstytojas turi galėti sukurti atskiras grupes (lentelėje grupė, pavyzdžiui grupė kuri studijuoja PHP kursą nuo 2018 sausio, galėtų vadintis PHP 2018.01, šiai grupei parenkamas kursas ir priskiriamas dėstytojas vedantis tą kursą (dėstytojo ID). 
* Tuomet dėstytojas turi galėti sukurti atskirai grupei paskaitas (paskaitai priskiriamas grupės ID, pavadinimas ir kt.). Kiekvienai paskaitai dėstytojas prideda failus (skaidres ir k.t.). 
* Prie sistemos prisijungus studentui turėtų rodyti tik jo grupes (tas prie kurių jis yra priskirtas). Paspaudus ant grupės, turėtų išvesti visas paskaitas ir jose patalpintus dėstytojo failus.


1. * Suprogramuokite prisijungimą prie sistemos, kiekvienas vartotojas prisijungia su slaptažodžiu (tam jums reikės papildyti DB lentelę vartotojai). Dėstytojams ir studentams gali būti kuriami atskiri puslapiai (front-office ir back-office). 

2. * Sukurkite dėstytojo administruojamus puslapius, dėstytojas turi galėti sukurti/redaguoti/ištrinti kursus, grupes, paskaitas. Visur kur galima turi būti pasirinkimo laukai (html „<select>“, pavyzdžiui kuriant naują grupę kursas turi būti pasirenkamas iš sąrašo). 

3. * Sukurkite dėstytojui galimybę įkelti failus prie atitinkamos paskaitos. Failus taip pat turi eiti ištrinti ir paslėpti (tam jums reikės papildomo lauko lentelėje failai, jis gali būti int tipo, pvz. jei reikšmė 1 tuomet failas rodomas studentams, jei reikšmė 0 tuomet failas rodomas tik dėstytojui). Dėstytojas turi galėti paslėpti/rodyti failą. Kiekvienai paskaitai dėstytojas turi galėti įkelti daugiau nei vieną failą.

4. * Sukurkite galimybę dėstytojui pridėti naujus studentus ir juos priskirti prie jau sukurtos grupės. Dėstytojas turėtų įvesti šiuos laukus: vardas, pavardė, el. paštas, slaptažodis. Tuomet dėstytojas turi galėti priskirti sukurtą studentą prie vienos ar kelių grupių.

5. * Sukurkite studentui prisijungimą prie sistemos. Studentas prisijungęs turi matyti grupes prie kurių jis yra priskirtas. Paspaudus ant grupės turi būti išvestas sąrašas su tos grupės paskaitomis ir failais priskirtais prie tos paskaitos. Studentas negali matyti grupių prie kurių jis nėra priskirtas, taip pat failų kurie yra paslėpti.

6. * Sukurkite studentui jo profilio koregavimo puslapį, jame studentas turi galėti pasikoreguoti savo vardą, pavardę, telefoną, el. pašto adresą (tiesa prieš saugojant el. pašto adresą sistema privalo patikrinti ar toks el. pašto adresas nėra registruotas duomenų bazėje).

7. * Sukurkite papildomą f-ją: žinutes. Dėstytojas turi galėti išsiųsti žinutę visai grupei (žinutė talpinama DB ir rodoma vartotojui prisijungus), apgalvokite kokių papildomų DB lentelių jums reikės šiai užduočiai įgyvendinti. Realizuokite kad patalpinta žinutė taip pat išsisiųstų el. paštu.

8. * Pamėginkite papildyti lentelę kursai papildomu lauku „aprašas“, kuriame bus talpinamas to kurso aprašymas. Administracinėje dalyje prie kurso redagavimo, turi atsirasti papildomas laukas aprašymui koreguoti. Kurso aprašui koreguoti panaudokite redaktorių: tinyMCE arba fckeditor. Įvesta informacija turės būti rodoma studentų puslapyje prie grupės (t.y. to kurso aprašas kuriai grupei jis priklauso).
