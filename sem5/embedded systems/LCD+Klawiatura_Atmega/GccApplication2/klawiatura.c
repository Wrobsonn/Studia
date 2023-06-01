/*
 * led.c
 *
 * Created: 21.10.2022 19:21:51
 * Author : Student_PL
 */

#define F_CPU 1000000UL
#include <avr/io.h>
#include <util/delay.h>
#include "klawiatura.h"
#include "LCD.h"
/* Replace with your library code */


void init(char chose){ // funkcja inicjalizacji (do ktorego portu podpieto klawiature)
	switch (chose){ // uzycie struktury switch
	case 1: //inicjalizacja portu A
		DDRA = 0xF0;
		PORTA = 0x0F;
		break;
	case 2: //inicjalizacja portu C
		DDRC = 0xF0;
		PORTC = 0x0F;
		break;
	case 3: // inicjalizacja portu D
		DDRD = 0xF0;
		PORTD = 0x0F;
		break;
	default: // default ti port A
		DDRA = 0xF0;
		PORTA = 0x0F;
		break;}
}

volatile unsigned char klawisz;

unsigned char czytaj_klawiature(char malaKla) //funkcja zczytujaca klawisz
{
	unsigned char wiersz, kolumna, key;
	if(malaKla){ // warunek na mala klawiature
		PORTA = 0xEF;
		key=1;
		for(wiersz=0x01; wiersz <= 0x08; wiersz <<=1,key++) // przejscie po wszystkich klawiszach malej klawiatury
			if(!(PINA&wiersz)) //sprawdzenie czy klawisz jest wcisniety
				return key; //zwrocenie klawisza
	}
	else{ //warunek na cala klawiature
	for(kolumna=0xEF, key=1; kolumna>= 0x71; (kolumna<<=1 | 0x01) &0xFF ) //przejscie po wszystkich kolumnach duzej klawiatury
	{
		PORTA = kolumna;
		for (wiersz=0x01; wiersz<=0x08; wiersz<<=1, key++) // przejscie po wszystkich wierszach duzej klawiatury
		if(!(PINA  & wiersz)) // spawdzenie czy klawisz jest klikniety
			return key; // wysiwetlenie klawisza
	}
	}
	return 0;
}
