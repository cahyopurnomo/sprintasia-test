# sprintasia-test
# 19/11/2019
# Cahyo Purnomo

# environment
- docker php7.2
- mariadb:latest
- port 8004, hapus jika tidak diperlukan

# instalasi
- create database 'testing'
- import _database/testing.sql
- sesuaikan configurasi 'application/config/database.php'

# end point
1). get all data : [GET] http://localhost:8004/api/mobil
2). get data by ID : [GET] http://localhost:8004/api/mobil/ID
3). insert data : [POST] http://localhost:8004/api/mobil
4). update data : [PUT] http://localhost:8004/api/mobil
5). delete data : [DELETE] http://localhost:8004/api/mobil

# untuk end-poin saya melakukan improv (2,3,4,5) karena tidak bisa diaplikasikan untuk case seperti front-end yg diminta
# akses front-end http://localhost:8004/
# screenshot testing API using POSTMAN inside _screenshot folder