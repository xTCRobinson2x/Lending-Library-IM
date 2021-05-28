import csv
import random

names = []
email_suffix = []
street_names = []
full_names = []
emails = []
addresses = []
zips = []
phone_numbers = []
address_suffix = []

with open("names.txt", 'r') as file1:
	for line in file1.readlines():
		names.append(line.rstrip())


with open("email_suffix.txt", 'r') as file2:
	for line in file2.readlines():
		email_suffix.append(line.rstrip())


with open("allstreets.txt", 'r') as file3:
	for line in file3.readlines():
		street_names.append(line.rstrip())


for i in range(500):
	full_names.append(random.choice(names) + " " + random.choice(names))
	phone_numbers.append(
		str(random.randrange(999)) + '-' + str(random.randrange(999)) + '-' + str(random.randrange(9999))
		)


for name in full_names:
	name_split = name.split()
	email_prefix = name_split[1] + name_split[0][0]
	emails.append(email_prefix + '@' + random.choice(email_suffix))


with open('uszips.csv', 'r') as file4:
	reader = csv.DictReader(file4)
	for row in reader:
		zips.append([row['zip'], row['city'], row['state_id']])


with open("address_suffix.txt", 'r') as file5:
	for line in file5.readlines():
		address_suffix.append(line.rstrip())


with open('customers.csv', 'w', newline='') as csvfile:
	fieldnames = ['id', 'first_name', 'last_name', 'email', 'address', 'city', 'state', 'zip_code', 'phone_number']
	writer = csv.writer(csvfile, delimiter=',', quotechar='"', quoting=csv.QUOTE_ALL)
	writer.writerow(fieldnames)
	for i in range(500):
		temp_name = full_names[i].split()
		temp_addr = str(random.randrange(9999)) + ' ' + random.choice(street_names) + ' ' + random.choice(address_suffix)
		temp_zip = random.choice(zips)
		writer.writerow([i, temp_name[0], temp_name[1], emails[i], temp_addr, temp_zip[1], temp_zip[2], temp_zip[0], phone_numbers[i]])
