import mysql.connector
from web_src.db_config import mydb

#need to have this in a try block in case the connect didn't work
try:
    #start a database cursor
   cursor = mydb.cursor()

   #send in SQL
   cursor.execute("select p.productName, o.quantity, o.locationID, o.orderedOn from live_order as o, product as p where o.productID = p.productID order by orderedOn ASC limit 1")

   #Fetch all the rows from the cursor
   rows = cursor.fetchall()

   #Loop over the rows
   for row in rows:
       print("New order!!! Current time: " + str(row[3]) + ", need to deliver " + str(row[1]) + " " + str(row[0]) + "(s) to location " + str(row[2]))


   
   
#always execute the finally block even if the try breaks
       #(There are a limited number of db connections per hour on the system --I think 500 for my Hostinger site)
       # Always close the connection to free up connections on the DB.
finally:
    cursor.close()