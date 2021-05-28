import csv
import random

names = []
email_suffix = []
full_names = []
emails = []

with open("names.txt", 'r') as file1:
	for line in file1.readlines():
		names.append(line.rstrip())


with open("email_suffix.txt", 'r') as file2:
	for line in file2.readlines():
		email_suffix.append(line.rstrip())


for i in range(500):
	full_names.append(random.choice(names) + " " + random.choice(names))


for name in full_names:
	name_split = name.split()
	email_prefix = name_split[1] + name_split[0][0]
	emails.append(email_prefix + '@' + random.choice(email_suffix))


with open('customer_accounts.csv', 'w', newline='') as csvfile:
	fieldnames = ['id', 'full_name', 'email', 'account_type']
	writer = csv.writer(csvfile, delimiter=',', quotechar='"', quoting=csv.QUOTE_ALL)
	writer.writerow(fieldnames)
	for i in range(500):
		writer.writerow([i, full_names[i], emails[i], "customer"])
