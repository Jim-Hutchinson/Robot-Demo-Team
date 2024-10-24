import mysql.connector
from db_config import mydb

cursor = mydb.cursor()
cursor.execute("Show tables;")

results = cursor.fetchall()

for x in results:
    print(x)