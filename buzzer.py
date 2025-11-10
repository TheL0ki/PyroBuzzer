#!/usr/bin/env python

import RPi.GPIO as GPIO
import os
import smbus
import datetime

b = smbus.SMBus(1)
address = 0x20
GPIOA = 0x12
GPIOB = 0x13
b.write_byte_data(address,0x0C,0xFF)
b.write_byte_data(address,0x0D,0xFF)

ranking_file = '/var/www/PyroBuzzer/ranking.txt'
stop_file = '/var/www/PyroBuzzer/stop-script'

def checkseat(seat):
	flag = False
	with open(ranking_file, 'r') as file_read:
		for line in file_read:
			if line[:2] == seat:
				flag = True
	if flag != True:
		with open(ranking_file, 'a') as file_w:
			if int(seat) < 10:
				id = int(seat[1:2])-1
			else:
				id = int(seat)-1
			file_w.write("%s Team %s - Button pressed | %s \n" % (seat, seat, datetime.datetime.now().isoformat()))

while True:
	if os.path.exists(ranking_file) and not os.path.exists(stop_file):
		buzzer_a = b.read_byte_data(address,GPIOA)
		buzzer_b = b.read_byte_data(address,GPIOB)
		result_a = '{0:08b}'.format(buzzer_a)
		result_b = '{0:08b}'.format(buzzer_b)
		if result_b[7:8] == "0":
			checkseat("01")
			print ("Button 1 pressed")
		if result_b[6:7] == "0":
			checkseat("02")
			print ("Button 2 pressed")
		if result_b[5:6] == "0":
			checkseat("03")
			print ("Button 3 pressed")
		if result_b[4:5] == "0":
			checkseat("04")
			print ("Button 4 pressed")
		if result_b[3:4] == "0":
			checkseat("05")
			print ("Button 5 pressed")
		if result_b[2:3] == "0":
			checkseat("06")
			print ("Button 6 pressed")
		if result_b[1:2] == "0":
			checkseat("07")
			print ("Button 7 pressed")
		if result_b[0:1] == "0":
			checkseat("08")
			print ("Button 8 pressed")
		if result_a[7:8] == "0":
			checkseat("09")
			print ("Button 9 pressed")
		if result_a[6:7] == "0":
			checkseat("10")
			print ("Button 10 pressed")
		if result_a[5:6] == "0":
			checkseat("11")
			print ("Button 11 pressed")
		if result_a[4:5] == "0":
			checkseat("12")
			print ("Button 12 pressed")
		if result_a[3:4] == "0":
			checkseat("13")
			print ("Button 13 pressed")
		if result_a[2:3] == "0":
			checkseat("14")
			print ("Button 14 pressed")
		if result_a[1:2] == "0":
			checkseat("15")
			print ("Button 15 pressed")
		if result_a[0:1] == "0":
			checkseat("16")
			print ("Button 16 pressed")
