#define F_CPU 1000000L
#include <avr/io.h>
#include <util/delay.h>
#include "LCD.h"
#include "klawiatura.h"

int main(void)
{
	DDRB =0xFF;
	DDRD|= 0x03;
	char liczba [17][2] = {" 0"," 1"," 2"," 3"," 4"," 5"," 6"," 7"," 8"," 9","10","11","12","13","14","15","16"};
	ini();
	init(1);
	unsigned char k = 0;
	while (1)
	{
		k=czytaj_klawiature(0);
		wyswietl(liczba[k],2);
		_delay_ms(500);
		czysc();
		_delay_ms(500);
	}
}
