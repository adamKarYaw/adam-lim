import mysql.connector
import requests
import datetime

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="password",
    db="psm2"
)


# Retrieve Forecasted Data from Open Weather
forecast_endpoint = 'https://api.openweathermap.org/data/2.5/onecall?lat=4.4721&lon=101.3801&exclude=minutely,daily&appid=a0aca8a89948154a4182dcecc780b513'
r = requests.get(url = forecast_endpoint)
data = r.json()
current_data = data['current']
hourly_data = data['hourly']

for hourly_data in hourly_data:
    dt = datetime.datetime.fromtimestamp(
        int(hourly_data['dt'])
    ).strftime('%Y-%m-%d %H:%M:%S')
    forecast_weather = hourly_data['weather'][0]
    print(forecast_weather)

# my_cursor = mydb.cursor()
#
# my_cursor.execute("SELECT * FROM events")
#
# my_result = my_cursor.fetchall()
#
# for row in my_result:
#     print(row[1])