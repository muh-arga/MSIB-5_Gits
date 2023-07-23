# Kompleksitas program Balance Bracket

Ukuran Kompleksitas program balance bracket yang dibuat adalah O(n).

## Penjelasan

- dapat dilihat pada bagian awal fungsi dilakukan iterasi melalui setiap karakter dalam string yang diinputkan, dimana jumlah itersai yang dilakukan sama dengan panjang dari string, sehingga kompleksitas nya adalah O(n) dengan n adalah panjang string.

- Pada fungsi terdapat operasi push dan pop pada stack. Kedua operasi tersebut memiliki kompleksitas O(1) karena langsung mengkases ke atas tumpukan (stack).

- Pada fugsi terdapat operasi pencarian dalam array dengan menggunakan in_array dan array_search. Kedua fungsi tersebut akan mengakses seluruh karakter dalam array OPENING_BRACKET dan CLOSING_BRACKET, sehingga kompleksitasnya adalah O(n) dimana n adalah panjang dari array.

Sehingga keseluruhan kompleksitas program balance bracket adalah O(n) dimana n adalah panjang string yang diinputkan. Hal ini karena iterasi melalui string memiliki kompleksitas O(n), sedangkan operasi push, pop, dan pencarian memiliki kompleksitas O(1) atau O(n) yang tidak melebihi kompleksitas keseluruhan.
