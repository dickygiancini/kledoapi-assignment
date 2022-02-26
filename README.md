## Tutorial Reproduce
Anda dapat reproduce Repo ini dengan melakukan : <br>
1. 
```bash
$ git clone https://github.com/dickygiancini/kledoapi-assignment.git (atau git@github.com:dickygiancini/kledoapi-assignment.git)
$ composer install
```

2. Kemudian copy file `.env.example` dan paste ke root direktori Anda, dan ubah menjadi file statis `.env`
3. Kemudian lakukan konfigurasi environment seperti database, username dan password
4. Lalu, lakukan perintah berikut
```bash
$ php artisan key:generate
$ php artisan migrate --seed
$ php artisan serve
```
5. Untuk dapat mengakses laman api, lakukan registerasi terlebih dahulu
6. Setelah registerasi, Anda dapat mengakses beberapa laman seperti :
```bash
/employees
/overtimes
/overtime-pays/calculate
```
