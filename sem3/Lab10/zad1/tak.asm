.386
.model flat, stdcall
option casemap:none

include \masm32\include\windows.inc
include \masm32\include\user32.inc
include \masm32\include\kernel32.inc
includelib \masm32\lib\user32.lib
includelib \masm32\lib\kernel32.lib

.const
.data

tekst_tytulu db "Sonda studencka",0
tekst_komunikatu db "Czy zrozumiales zasady tworzenia komunikatow?",0
tekst_komunikatu2 db "Dobrze sie czujesz?",0
msg_no1 db "Idz do lekarza ",0
msg_yes1 db "Super ",0
msg_yes db "Mozemy zatem przejsc do nastepnej czesci",0
msg_no db "Szkoda, cwicz dalej",0
msg_anuluj db "Nie odpowiedziales na pytanie!",0
.data?
.code

main:
invoke MessageBox,0,addr tekst_komunikatu,addr tekst_tytulu,MB_YESNOCANCEL or MB_ICONQUESTION
.IF EAX==IDYES
invoke MessageBox,0,addr tekst_komunikatu2,addr tekst_tytulu,MB_YESNO or MB_ICONQUESTION
.IF EAX==IDNO
invoke MessageBox,0,addr msg_no1,addr tekst_tytulu,MB_OK or MB_ICONQUESTION
.ELSEIF EAX==IDYES
invoke MessageBox,0,addr msg_yes1,addr tekst_tytulu,MB_OK or MB_ICONQUESTION
.ENDIF
.ELSEIF EAX==IDNO
invoke MessageBox,0,addr msg_no,addr tekst_tytulu,MB_OK or MB_ICONHAND
.ELSEIF EAX==IDCANCEL
invoke MessageBox,0,addr msg_anuluj,addr tekst_tytulu,MB_OK or MB_ICONHAND
.ENDIF


invoke ExitProcess,0
end main
