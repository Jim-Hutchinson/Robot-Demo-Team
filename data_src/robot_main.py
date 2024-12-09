import mysql.connector
from db_config import mydb
import qr_scan

print("Running!")
lastRecord = []
checkActive = False
while True:
    cursor = mydb.cursor()
    cursor.execute("select * from live_order order by orderedOn desc limit 1")

    results = cursor.fetchall()
    if results!=lastRecord and checkActive == True:
        print("Results Changed!")
        ProductID = results[0][1]
        print(ProductID)
        qr_scan.qrScan(ProductID)  
    lastRecord = results
    checkActive = True