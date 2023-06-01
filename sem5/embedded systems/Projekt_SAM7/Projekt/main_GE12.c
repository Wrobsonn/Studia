#include <targets\AT91SAM7.h>
#include "pcf8833u8_lcd.h"

// Definicja przyciskow
#define SW_1 PIOB_SODR_P24 //przycisk po lewej stronie joysticka
#define SW_2 PIOB_SODR_P25 // przycisk po prawej stronie joysticka

#define LCD_BACKLIGHT PIOB_SODR_P20
#define AUDIO_OUT PIOB_SODR_P19

// Definicja joysticka
#define LEFT PIOA_SODR_P7 // lewo
#define DOWN PIOA_SODR_P8 // dol
#define UP PIOA_SODR_P9 // gora
#define RIGHT PIOA_SODR_P14 // prawo
#define CENTER PIOA_SODR_P15 // srodek



void GreenScreen(void)   //funckja zmieniajaca tlo na kolor zielony
{

    long i; // loop counter

    // Row address set (command 0x2B)
    WriteSpiCommand(PASET); //PASET NA PAGEADDRSET
    WriteSpiData(0);
    WriteSpiData(131);

    // Column address set (command 0x2A)
    WriteSpiCommand(CASET); //CASET na COLADDRSET
    WriteSpiData(0);
    WriteSpiData(131);

    // set the display memory to BLACK
    WriteSpiCommand(RAMWR); //RAMWR na MEMWRITE
    for(i = 0; i < ((132 * 132) / 2); i++)
    {
        WriteSpiData((GREEN >> 4) & 0xFF);
        WriteSpiData(((GREEN & 0xF) << 4) | ((GREEN >> 8) & 0xF));
        WriteSpiData(GREEN & 0xFF);
    }
}


void ColorScreen(int cColor)   //funckja zmieniajaca tlo na kolor podany przez uzytkownika
{

    long i; // loop counter

    // Row address set (command 0x2B)
    WriteSpiCommand(PASET); //PASET NA PAGEADDRSET
    WriteSpiData(0);
    WriteSpiData(131);

    // Column address set (command 0x2A)
    WriteSpiCommand(CASET); //CASET na COLADDRSET
    WriteSpiData(0);
    WriteSpiData(131);

    // set the display memory to BLACK
    WriteSpiCommand(RAMWR); //RAMWR na MEMWRITE
    for(i = 0; i < ((132 * 132) / 2); i++)
    {
        WriteSpiData((cColor >> 4) & 0xFF);
        WriteSpiData(((cColor & 0xF) << 4) | ((cColor >> 8) & 0xF));
        WriteSpiData(cColor & 0xFF);
    }
}

void Text(int x0, int y0, int x1, int y1, int cColor)
{
// loop counter
    int i;
// Row address set (command 0x2B)
    WriteSpiCommand(PASET);
    WriteSpiData(x0);
    WriteSpiData(x0+x1);
// Column address set (command 0x2A)
    WriteSpiCommand(CASET);
    WriteSpiData(y0);
    WriteSpiData(y0+y1);

    WriteSpiCommand(RAMWR);
    for(i = 0; i < ((132*132)/2 ); i++)
    {
        WriteSpiData((cColor >> 4) & 0xFF);
        WriteSpiData(((cColor & 0xF) << 4) | ((cColor >> 8) & 0xF));
        WriteSpiData(cColor & 0xFF);
    }
}


int y(int x, int y, int Size, int fColor, int
      bColor, char *pString) //funkcja zwacająca dlugosc tekstu
{
    int dy = y; //przypisanie w ktorym miejscu zaczyna sie tekst
    while (*pString != 0x00)   //wypisywanie znakow
    {
// draw the character
        LCDPutChar(*pString++, x, dy, Size, fColor, bColor);
// advance the dy position
        if (Size == SMALL) // dopisanie ilosci pikseli jakie zajmuje czcionka
            dy += 6;
        else if (Size == MEDIUM)
            dy += 8;
        else
            dy += 8;
// bail out if dy exceeds 131
        if (dy > 131) return dy; // sprawdzenie czy tekst nie wychodzi poza wyswietlacz.
    }
    return dy-y; // zworcenie dlugosci tekstu ( koniec tekstu - poczatek tekstu)
}

int x(int Size)  // funkcja zwracajaca wysokosc tekstu
{
    int si=0;
    if (Size == SMALL) // sprawdzenie jaka czcionka zostal wyswietlony tekst na LCD
        si = 8;
    else if (Size == MEDIUM)
        si = 12;
    else
        si = 16;
}

int main ()
{

    InitLCD(); // Inicjalizacja ekranu LCD
    SetContrast(30);
    LCDClearScreen(); // Wyczyszczenie ekranu

    LCDPutStr("Jakub Wrobel", 15, 5, LARGE, GREEN, WHITE); // Wy�wietlenie na LCD imienia i nazwiska
    LCDPutStr("5.8.16: ", 30, 30, LARGE, GREEN, WHITE); // Wy�wietlenie grupy w kolejnej linii
    Delaya(10000000);
    LCDClearScreen(); // Wyczyszczenie ekranu
    LCDWrite130x130bmp(); // Wy�wietlenie obrazu na LCD
    Delaya(10000000);
    LCDClearScreen(); // Wyczyszczenie ekranu

    PMC_PCER=PMC_PCER_PIOB;
    PMC_PCER=PMC_PCER_PIOA;
    PIOB_OER=LCD_BACKLIGHT;
    PIOB_PER=LCD_BACKLIGHT;

    while(1)
    {
        if((PIOB_PDSR & SW_1)==0)
        {
            PIOB_SODR |= LCD_BACKLIGHT;
            Delaya(1000000);
            GreenScreen(); // Wyczyszczenie ekranu
            Delaya(1000000);
            LCDPutStr("SW1",110,10,LARGE,WHITE,BLACK);
            Delaya(3000000);
            int y = y(110,10,LARGE,WHITE,BLACK,"SW1");
            int x = x(LARGE);
            Text(110,10,x,y,WHITE);
        }
        if((PIOB_PDSR & SW_2)==0)
        {
            PIOB_SODR |= LCD_BACKLIGHT;
            Delaya(1000000);
            GreenScreen(); // Wyczyszczenie ekranu
            Delaya(1000000);
            LCDPutStr("SW2",110,100,LARGE,WHITE,BLACK);
            Delaya(3000000);
            int y = y(110,100,LARGE,WHITE,BLACK,"SW2");
            int x = x(LARGE);
            Text(110,100,x,y,RED);   //(wysokosc, szerokosc, dlugosc, grubosc)
        }

        if((PIOA_PDSR & UP)==0)
        {
            PIOB_SODR |= LCD_BACKLIGHT;
            Delaya(1000000);
            GreenScreen(); // Wyczyszczenie ekranu
            Delaya(1000000);
            LCDPutStr("UP",15,60,LARGE,WHITE,BLACK);
            Delaya(3000000);
            int y = y(110,100,LARGE,WHITE,BLACK,"UP");
            int x = x(LARGE);
            Text(15,60,x,y,RED);
        }
        if((PIOA_PDSR & DOWN)==0)
        {
            PIOB_SODR |= LCD_BACKLIGHT;
            Delaya(1000000);
            GreenScreen();
            Delaya(1000000);
            LCDPutStr("DOWN",110,50,LARGE,WHITE,BLACK);
            Delaya(3000000);
            int y = y(110,100,LARGE,WHITE,BLACK,"DOWN");
            int x = x(LARGE);
            Text(110,50,x,y,RED);
        }
        if((PIOA_PDSR & LEFT)==0)
        {
            PIOB_SODR |= LCD_BACKLIGHT;
            Delaya(1000000);
            GreenScreen();
            Delaya(1000000);
            LCDPutStr("LEFT",60,10,LARGE,WHITE,BLACK);
            Delaya(3000000);
            int y = y(110,100,LARGE,WHITE,BLACK,"LEFT");
            int x = x(LARGE);
            Text(60,10,x,y,RED);
        }
        if((PIOA_PDSR & RIGHT)==0)
        {
            PIOB_SODR |= LCD_BACKLIGHT;
            Delaya(1000000);
            GreenScreen();
            Delaya(1000000);
            LCDPutStr("RIGHT",60,90,LARGE,WHITE,BLACK);
            Delaya(3000000);
            int y = y(110,100,LARGE,WHITE,BLACK,"RIGHT");
            int x = x(LARGE);
            Text(60,90,x,y,RED);
        }
        if((PIOA_PDSR & CENTER)==0)
        {
            PIOB_SODR |= LCD_BACKLIGHT;
            Delaya(1000000);
            GreenScreen(); // Wyczyszczenie ekranu
            Delaya(1000000);
            LCDPutStr("CENTER",60,50,LARGE,WHITE,BLACK);
            Delaya(3000000);
            int y = y(110,100,LARGE,WHITE,BLACK,"CENTER");
            int x = x(LARGE);
            Text(110,100,x,y,RED);
        }
    }

}
