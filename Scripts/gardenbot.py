import sqlite3
import time

db = sqlite3.connect('database.db')

cursor = db.cursor()

sensor1_name = 'air_temp'
sensor1_value = '26'
sensor1_time = int(time.time())
 
sensor2_name = 'air_humidity'
sensor2_value = '70'
sensor2_time = int(time.time())

sensor3_name = 'soil_temp'
sensor3_value = '21'
sensor3_time = int(time.time())
 
sensor4_name = 'soil_humidity'
sensor4_value = '75'
sensor4_time = int(time.time())
 
# PRVOTNí VYTVOřENí DATAáZE
#cursor.execute('''CREATE TABLE required(id INTEGER PRIMARY KEY, name TEXT,value INT)''')
#cursor.execute('''INSERT INTO required(name, value) VALUES(?,?)''', (sensor3_name,sensor3_value))
#cursor.execute('''INSERT INTO required(name, value) VALUES(?,?)''', (sensor4_name,sensor4_value))

# UPDATE HODNOT V DATABáZI
cursor.execute('''UPDATE sensors SET value = ?, time = ? WHERE name = ?''', (sensor1_value,sensor1_time,sensor1_name))
print ("1 done")
cursor.execute('''UPDATE sensors SET value = ?, time = ? WHERE name = ?''', (sensor2_value,sensor2_time,sensor2_name))
print ("2 done")
cursor.execute('''UPDATE sensors SET value = ?, time = ? WHERE name = ?''', (sensor3_value,sensor3_time,sensor3_name))
print ("3 done")
cursor.execute('''UPDATE sensors SET value = ?, time = ? WHERE name = ?''', (sensor4_value,sensor4_time,sensor4_name))
print ("4 done")
 
db.commit()
