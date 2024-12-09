import mysql.connector
import time

# User names and passwords for db connection

dbuser="u413142534_wrobots"
dbpwd="S33TheOrder?"
dbaddress="156.67.74.51"
dbname="u413142534_warehouse"

print("Welcome to the robot operation code")
print("I will start operation by checking for an order")

#make connection
cnx = mysql.connector.connect(user=dbuser, password=dbpwd,

                              host=dbaddress,

                              database=dbname)

NoOrderExists = True

while NoOrderExists:

   #need to have this in a try block in case the connect didn't work
   try:
      #start a database cursor
      cursor = cnx.cursor()

      #send in SQL
      cursor.execute("SELECT locationName,productName,orderedOn,quantity,orderStatus FROM live_order INNER JOIN location using(locationID) INNER JOIN product using (productID) ORDER BY orderedOn LIMIT 1;")

   except:
      print("An exception occurred")
      #Fetch all the rows from the cursor
      rows = cursor.fetchall()

      #Loop over the rows
      for row in rows:

              print("There is an order for " + str(row[3]) + " of product " + str(row[1]) + " that need to go to " + str(row[0]))
              order = row
              NoOrderExists = False

      if NoOrderExists:
              print("There are no orders yet.  I will check again in a few minutes")
              time.sleep(60)





time.sleep(10)
print("I am heading out to start my delivery for the order")

print(order)
time.sleep(10)

#Enter loop to find the Product with camera and QR code

print("Looking for Product " + order[1])
time.sleep(10)

#Arrive at the Product
print("Found Product " + order[1])
time.sleep(10)

#Grab the Product with Arm
print("Grabbing " + str(order[3]) + " " + order[1] + " and loading my bin")
time.sleep(10)

#Move to Delivery Box, find location with camera and QR code
print("Moving to " + order[0] + " for delivery, using camera and QR code to identify")
time.sleep(10)

#Arrive at Delivery Box
print("Arrive at " + order[0] + " for delivery")
time.sleep(10)

#Drop at product in delivery box
print("Dropping " + str(order[3]) + " " + order[1] + " into " + order[0])
time.sleep(10)

print("Order completed")
print("Updating Database ")
time.sleep(10)

try:
      #start a database cursor
      cursor = cnx.cursor()
      #send in SQL
      #TODO Decide how to remove the order from the queue but keep a record of orders
      #cursor.execute("DELETE FROM live_order;")
      cursor.execute("SELECT FROM live_order;")
except:
      print("An exception occurred")
cnx.close()

print("Program end ")