import smtplib
import sys

print sys.argv[1]
print sys.argv[2]
print sys.argv[3]
print sys.argv[4]


user = sys.argv[1]
pwd = sys.argv[2]
recipient = sys.argv[3]
subject = sys.argv[4]
body = sys.argv[5]
gmail_user = user
gmail_pwd = pwd
FROM = user
TO = recipient if type(recipient) is list else [recipient]
SUBJECT = subject
TEXT = body
message = """From: %s\nTo: %s\nSubject: %s\n\n%s
""" % (FROM, ", ".join(TO), SUBJECT, TEXT)
try:
        server = smtplib.SMTP("smtp.gmail.com", 587)
        server.ehlo()
        server.starttls()
        server.login(gmail_user, gmail_pwd)
        server.sendmail(FROM, TO, message)
        server.close()
        print 'successfully sent the mail'
except:
        print "failed to send mail"
 
 
