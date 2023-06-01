
#ifndef LCD_H_
#define LCD_H_
#include "LCD.h"

void cmd(uint8_t komenda);
void ini();
void czysc(); 
void ustaw(unsigned char x, unsigned char y ); 
void czysc_y(int8_t x, int8_t y); 
void wyswietl(char *tekst, int8_t dlugosc); 

#endif