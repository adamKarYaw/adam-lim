import mysql.connector
import requests
import datetime

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="password",
    db="psm2"
)

print('Scheduler Running....')

# Retrieve Data from DB
db_object = []
my_cursor = mydb.cursor()
my_cursor.execute("SELECT * FROM events")
my_result = my_cursor.fetchall()
for row in my_result:
    js = {
        "id": row[0],
        "start": row[1],
        "end": row[2],
        "title": row[3],
        "dest": row[4],
        "location": row[5],
        "eventType": row[6],
        "userId": row[7]
    }
    db_object.append(js)

lat = 3.4921
lon = 103.3895

# Retrieve Forecasted Data from Open Weather
forecast_endpoint = f'https://api.openweathermap.org/data/2.5/onecall?lat={lat}&lon={lon}&exclude=minutely,daily&appid=a0aca8a89948154a4182dcecc780b513'
r = requests.get(url=forecast_endpoint)
data = r.json()
current_data = data['current']
hourly_data = data['hourly']

# Check Condition
for hourly_data in hourly_data:
    dt = datetime.datetime.fromtimestamp(
        int(hourly_data['dt'])
    ).strftime('%Y-%m-%d %H:%M:%S')
    forecast_weather = hourly_data['weather'][0]

    if ((forecast_weather['main'] == 'Rain') or (forecast_weather['main'] == 'Clouds')):
        for row in db_object:
            if (row['eventType'] == 'Outddoor'):
                print('Send Alert Email')


print('Scheduler Stopped....')