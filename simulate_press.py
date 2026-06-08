#!/usr/bin/env python
"""Simulate a buzzer button press while buzzer.py runs in --dev mode."""

import os
import sys

SCRIPT_DIR = os.path.dirname(os.path.abspath(__file__))
PRESS_FILE = os.path.join(SCRIPT_DIR, 'dev-press')


def main():
	if len(sys.argv) != 2 or not sys.argv[1].isdigit():
		print('Usage: python simulate_press.py <1-16>')
		sys.exit(1)

	button = int(sys.argv[1])
	if button < 1 or button > 16:
		print('Button must be between 1 and 16')
		sys.exit(1)

	with open(PRESS_FILE, 'w') as f:
		f.write(str(button))

	print('Simulated press: button {}'.format(button))


if __name__ == '__main__':
	main()
