import mysql.connector
import requests
import datetime
import smtplib
from email.message import EmailMessage
from email.mime.application import MIMEApplication
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from datetime import datetime
import pytz


def send_email(email, title, description, forecasted_weather):
    msg = MIMEMultipart()
    msg['Subject'] = 'Calendar Alert'
    msg['From'] = 'Calendar Team'
    msg['To'] = email

    body = f"{title}, {description}, {forecasted_weather}"
    msgText = MIMEText('<b>%s</b>' % (body), 'html')
    msg.attach(msgText)

    server = smtplib.SMTP_SSL('smtp.gmail.com', 465)
    server.login("semtest98@gmail.com", "karwei98+")

    server.send_message(msg)
    server.quit()


def send_reminder_email(email, title, description):
    msg = MIMEMultipart()
    msg['Subject'] = 'Calendar Reminder'
    msg['From'] = 'Calendar Team'
    msg['To'] = email

    body = f"{title}, {description} in 30minute"
    msgText = MIMEText('<b>%s</b>' % (body), 'html')
    msg.attach(msgText)

    server = smtplib.SMTP_SSL('smtp.gmail.com', 465)
    server.login("semtest98@gmail.com", "karwei98+")

    server.send_message(msg)
    server.quit()


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
my_cursor.execute("SELECT * FROM events JOIN user WHERE events.userID=user.userID")
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
        "userId": row[7],
        "email": row[10]
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
    dt = datetime.fromtimestamp(
        int(hourly_data['dt'])
    ).strftime('%Y-%m-%d %H:%M:%S')
    forecast_weather = hourly_data['weather'][0]

    if ((forecast_weather['main'] == 'Rain') or (forecast_weather['main'] == 'Clouds')):
        for row in db_object:
            if (row['eventType'] == 'Outddoor'):
                print('Send Alert Email')
                send_email(row['email'], 'Calendar Alert', 'You have an event at ' + dt + ' in ' + row['location'] + '.', forecast_weather['main'])

# Reminder
for row in db_object:
    tz = pytz.timezone('Asia/Kuala_Lumpur')
    malaysia_current_datetime = datetime.now(tz)

    event_start_time = row['start']

    time_delta = (event_start_time - malaysia_current_datetime.replace(tzinfo=None))
    total_seconds = time_delta.total_seconds()
    minutes = total_seconds / 60
    if (minutes > 0 and minutes <= 30):
        print('Send Reminder Email')
        send_reminder_email(row['email'], 'Calendar Reminder', 'You have an event at ' + dt + ' in ' + row['location'] + '.')


print('Scheduler Stopped....')