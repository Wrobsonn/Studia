#define F_CPU 1000000L

#include <avr/io.h>

#include <util/delay.h>

#include "library.c"



int main(void)
{
	DDRB = 0xFF;
	init();
	unsigned char k = 0;
	PORTB = 0;
	while (1) {

		k = czytaj_klawiature();
		PORTB = k;

	}
}