/*
 * led.c
 *
 * Created: 21.10.2022 19:21:51
 * Author : Student_PL
 */ 

#include <avr/io.h>


/* Replace with your library code */


void init(){
	DDRA = 0xF0;
	PORTA = 0x0F;
}
unsigned char czytaj_klawiature(void);
volatile unsigned char klawisz;

unsigned char czytaj_klawiature(void)
{
	
	unsigned char wiersz, kolumna, key;
	for(kolumna=0xEF, key=1; kolumna>= 0x71; (kolumna<<=1 | 0x01) &0xFF )
	{
		PORTA = kolumna;
		for (wiersz=0x01; wiersz<=0x08; wiersz<<=1, key++)
		if(!(PINA  & wiersz))
		return key;
	}
	return 0;
}
