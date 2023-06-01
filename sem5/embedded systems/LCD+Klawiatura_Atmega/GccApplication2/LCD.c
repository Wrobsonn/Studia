/*
 * lcd.c
 *
 * Created: 18.11.2022 18:01:21
 * Author : Student_PL
 */ 

#define F_CPU 1000000UL
#include <avr/io.h>
#include <util/delay.h>
#include "LCD.h"
#define LCD_DDR DDRB  // przypisanie wyswietlacza LCD do portu DDRB i poszczególnych pinów
#define LCD_PORT PORTB
#define LCD_RS PB0
#define LCD_EN PB1
#define LCD_DB4 PB4
#define LCD_DB5 PB5
#define LCD_DB6 PB6
#define LCD_DB7 PB7

/* Replace with your library code */
void cmd(uint8_t komenda)
{
	LCD_PORT |=1<<LCD_EN; //wlaczanie linii ENABLE
	LCD_PORT = (komenda & 0xF0) | (LCD_PORT & 0x0F); // wyslanie 4 starszych bitow
	LCD_PORT &= ~(1<<LCD_EN); // potwierdzenie wyslania danych poprzez opadniecie ENABLE
	asm volatile("nop"); // odczekanie jednego cyklu
	LCD_PORT |=1<<LCD_EN;
	LCD_PORT = ((komenda & 0x0F)<<4) | (LCD_PORT & 0x0F); // wyslanie 4 mlodszych bitow
	LCD_PORT &= ~(1<<LCD_EN);
	_delay_us(50); // odczekanie czasu na potwiedzenie wyslanych danych
}

void ini()
{
	LCD_DDR = (0xF0) | (1<<LCD_RS) | (1<<LCD_EN);//ustawienie kierunku wyjsciowego dla wszystkich linii
	LCD_PORT = 0;//ustawienie poczatkowego stanu niskiego na wszystkich liniach
	LCD_PORT &= ~(1<<LCD_RS);//rozpoczecie wysylania komendy
	//ustawienie parametrow wyswietlacza, bit4: 1-8 linii, 0-4 linii
	//bit3: 1-2 wiersze, 0-1 wiersz, bit2: 0-wymiar znaku 5x8, 1 - wymiar 5x10
	cmd(0b00101000);
	LCD_PORT |= 1<<LCD_RS;
	LCD_PORT |= 1<<LCD_RS;
	//bit2 - tryb pracy wyswietlacza
	//bit1:1-presuniecie okna, 0 - przesuniecie kursora
	cmd(0b00000110);
	LCD_PORT |=1<<LCD_RS;
	LCD_PORT &=~(1<<LCD_RS);
	//bit2:1-wyswietlacz wlaczony, 0-wylaczony
	//bit1: 1 - wlaczenie wyswietlacza kursora,0 - kursor niewidoczny
	//bit0: 1 - kursor miga,0 - kursor nie miga
	cmd(0b00001100);
	LCD_PORT |= 1<<LCD_RS;
}

void czysc() // funkcja czyszczaca wyswietlacz
{
	LCD_PORT &= ~(1<<LCD_RS); // przestawia na linii RS wartosc na 0 po to by wyslac komende a nie dane
	cmd(0x01); // wyslanie polecenia wyczyszczenia
	LCD_PORT |= 1<<LCD_RS; // przestawia linie RS na wartosc 1 odpowiadajaca wprowadzaniu danych
	_delay_ms(50);
}

void ustaw(unsigned char x, unsigned char y ) // funkcja ustawiaj¹ca kursor w danej pozycji
{
	LCD_PORT &=~(1<<LCD_RS);
	cmd((x*0x40+y) | 0x80);
	LCD_PORT |= 1<<LCD_RS;
	_delay_ms(5);
}

void czysc_y(int8_t x, int8_t y) // funkcja usuwaj¹ca tekst do od podanego punktu do konca lini
{
	while(y<16)
	{
		ustaw(x,y); // wywikabue funkcji ustawiajacej kursor w podanej pozycji
		cmd(' '); // wyslanie polecenia czyszczacego
		y++; // przejscie do nastepnego znaku
		_delay_ms(50);
	}
}

void wyswietl(char *tekst, int8_t dlugosc) //funkcja wyswietlajaca tekst
{
	int8_t i=0;
	ustaw(0,0); // ustaw kursor na pierwszy znak pierwszej lioni
	while(i<dlugosc) // przejscie po wszystkich znakach tekstu
	{
		if(i==16) // jesli trafi na ostatni znak lini zmien linie
		{
			ustaw(1,0);
		}
		cmd(tekst[i]); // wypisz i-ty znak tekstu
		i++; // inkrementacja
	}
}