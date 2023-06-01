//
//  main.swift
//  JakubWrobel_kolokwium1
//
//  Created by student on 01/12/2022.
//  Copyright © 2022 PL. All rights reserved.
//

import Foundation

print("Kolokwium 1 Jakub Wrobel zestaw O")
//zad 1
var p=0
while(p<9999 || p>100001){
print("Podaj liczbe 5 cyfrowa")
    p = Int(readLine()!)!}
var c=11
while(c<0 || c>10){
print("Podaj liczbe 1 cyfrowa")
    c = Int(readLine()!)!}
var tasama = 0
var podzielne = 0
var reszta = 0
let copyp = p
while(p != 0){
    reszta = p%10
    //print(reszta)
    if( reszta == c){
        tasama+=1}
    if( reszta%c == 0){
        podzielne+=1
    }
    p = (p - p%10)/10
}
print("W liczbie \(copyp) cyfra \(c) wystepuje \(tasama) razy, a cyfr podzielnych przez \(c) jest \(podzielne)")
//zad 2
var x1 = Int.random(in: 10..<201)
var y1 = Int.random(in: 10..<201)
// numer cwiartki
if (x1 > 0 && y1 > 0){
    print("Punkt (\(x1),\(y1)) lezy w 1 cwietrce")
}

else if (x1 > 0 && y1 < 0){
    print("Punkt (\(x1),\(y1)) lezy w 2 cwietrce")
}

else if (x1 < 0 && y1 < 0){
    print("Punkt (\(x1),\(y1)) lezy w 3 cwietrce")
}

else if (x1 < 0 && y1 < 0){
    print("Punkt (\(x1),\(y1)) lezy w 4 cwietrce")
}
//czy na osi
else{
    if(x1 == 0){
        print("Punkt (\(x1),\(y1))lezy na osi X")
    }
    else{
        print("Punkt (\(x1),\(y1)) lezy na osi Y")
    }
}

//czy w kole
var odl = sqrt(Double((0-x1)*(0-x1)+(0-y1)*(0-y1)))
if(odl < 15 ){
    print("Punkt (\(x1),\(y1)) lezy w kole o srodku w punkcie (0,0) i promieniu 15")
}
else{
    print("Punkt (\(x1),\(y1)) lezy poza okregiem")
}

// na obszarze
if(y1>45 && y1<55){
    print("Punkt (\(x1),\(y1)) lezy na zdefiniowanym obszarze")
}
else{
    print("Punkt (\(x1),\(y1)) nie lezy na zdefiniowanym obszarze")
}
//zad 3
// Numer, oddzial, przepracowane godziny
print("Podaj ilosc oddzialow")
guard let M = Int(readLine()!) else{
    fatalError("To nie jest liczba calkowita")
}
print("Podaj ilosc pracownikow")
guard let P = Int(readLine()!) else{
    fatalError("To nie jest liczba calkowita")
}

let prac = M*P

var pracownicy: [[Int]] = Array(repeating: Array(repeating:0, count: 3), count: prac)

for i in 0..<prac{
    pracownicy[i][0] = i
    pracownicy[i][1] = Int.random(in: 0..<M)
    pracownicy[i][2] = Int.random(in: 90..<251)
    }
//print(pracownicy)

var godz :[Int] = Array(repeating: 0, count: M) // suma godzin w danym dziale
var liczbaprac :[Int] = Array(repeating: 0, count: M) // tablica z liczba pracownikow danegodzialu dzialy nazwane cyframi od 0..<M

for i in 0..<prac{
    godz[pracownicy[i][1]]+=pracownicy[i][2]
    liczbaprac[pracownicy[i][1]]+=1
}
//print(godz)
//print(liczbaprac)
var sredniapraca: [[Int]] = Array(repeating: Array(repeating:0, count: 2), count: M) //placa/liczbaprac

for i in 0..<M{
    sredniapraca[i][0]=i
    sredniapraca[i][1]=godz[i]/liczbaprac[i]
}
//print(sredniapraca)
var znajdowani: [[Int]] = Array(repeating: Array(repeating:0, count: 3), count: M)
for i in 0..<M{
    znajdowani[i][0]=i
}
var godziny = 0
for i in 0..<prac{
    godziny = pracownicy[i][2] - sredniapraca[pracownicy[i][1]][0]
    if(godziny < 0){
        godziny*=(-1)
    }
    if(godziny<sredniapraca[pracownicy[i][1]][1]){
        znajdowani[pracownicy[i][1]][1]=i
        znajdowani[pracownicy[i][1]][2]=godziny
    }
}

print(znajdowani)
