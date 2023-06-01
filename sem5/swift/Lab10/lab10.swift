import Foundation

print("Zadanie 1")

func los(n: Int) {
    for i in 0..<n{
        print("\(i+1) liczba to \(Int.random(in: 1..<251))")
}
}

func min(tablica : [Int]){
    var tab1=tablica
    tab1.sort()
    print("\(tab1[0])")
}

func max(tablica : [Int]){
    var tab1=tablica
    tab1.sort(by:>)
    print("\(tab1[0])")
}

func minmax(tablica : [Int]){
    var tab1=tablica
    tab1.sort()
    print("\(tab1[0]), \(tab1[tab1.count-1])")
}



print("Podaj ile liczb chcesz wylosowac")
var x = Int(readLine()!)!
los(n:x)

print("Podaj 3 liczby")
print ("1")
var a = Int(readLine()!)!
print ("2")
var b = Int(readLine()!)!
print ("3")
var c = Int(readLine()!)!

var tab = [a,b,c]

print(tab)
min(tablica:tab)
max(tablica:tab)
minmax(tablica:tab)

print("zad 2")

func menu(){
    print("1 - dodawanie")
    print("2 - odejmowanie")
    print("3 - mnozenie")
    print("4 - dzielenie")
    print("5 - pierwiastkowanie")
}

func dzialanie(n:Int){

    print("Podaj pierwsza liczbe")
    let x1 = Double(readLine()!)!
    print("podaj druga liczbe")
    let x2 = Double(readLine()!)!
    
    switch(n){
        case 1:
            print("\(x1+x2)")
            break
        case 2:
            print("\(x1-x2)")
            break
        case 3:
            print("\(x1*x2)")
            break
        case 4:
            if(x2 == 0){
                print("dzielenie przez 0")
            }
            else{
                print("\(x1/x2)")
            }
            break
        case 5:
            print("\(sqrt(x1))")
            break
        default:
            print("Nie wybrano dzialania")
            break
        
    }
}


menu()
print("Podaj ktore dzialanie chcesz wykonac")
var dzial = Int(readLine()!)!
dzialanie(n:dzial)



print("zad 3")

func wczytajpunkty() -> (Int, Int) {
    print("Podaj pierwsza wspol")
    let x1=Float(readLine()!)!
    print("Podaj druga wspol")
    let y1=Float(readLine()!)!
    return (x1,y1)
}

func odl(wsp1:(Int,Int),wsp2:(Int,Int)){
    let a = (wsp2.0-wsp1.0)*(wsp2.0-wsp1.0)+(wsp2.1-wsp1.1)*(wsp2.1-wsp1.1)
    print("\(sqrt(Double(a)))")
}

func cw(wsp1:(Int,Int)){
    if(wsp1.0 > 0){
        if(wsp1.1>0){
            print("1")
        }
        else{
            print("2")
        }
    }
    else{
    if(wsp1.1>0){
            print("4")
        }
        else{
            print("3")
        }

    }
}

func kwadrat(wsp1:(Int,Int)){
    let kw=wczytajpunkty()
    if(wsp1.0<kw.0 && wsp1.0>(-1)*wsp1.0 && wsp1.1<kw.1 && wsp1.1>(-1)*kw.1){
        print("Lezy w kwadracie")
    }
    else{
        print("Lezy poza kwadratem")
    }
}

var p2: (Int, Int) = wczytajpunkty()
var p1: (Int, Int) = wczytajpunkty()

odl(wsp1:p1,wsp2:p2)
cw(wsp1:p2)
kwadrat(wsp1: p2)

print("Zad 4")

func wczytajTablice(x: inout [Int], n: Int) -> [Int]{
    for _ in 0..<n{
        print("Podaj element tablicy")
        x.append(Int(readLine()!)!)
    }
    return x
}

func wyswietlTablice(x: inout [Int]){
    print(x)
}

func minTab(x: inout [Int], n: Int) -> (Int,Int){
    var min = x[0]
    var ind = 0
    for i in 1..<n{
        if(min>x[i]){
            min=x[i]
            ind=i
        }
    }
    print("Najmniejszy element to \(min) i znajduje sie na \(ind) ibdeksie")
    return(x[ind],ind)
}

func maxTab(x: inout [Int], n: Int) -> (Int,Int){
    var max = x[0]
    var ind = 0
    for i in 1..<n{
        if(max<x[i]){
            max=x[i]
            ind=i
        }
    }
    print("najwiekszy element to \(max) i znajduje sie na \(ind) ibdeksie")
    return(x[ind],ind)
}

func swap(x: inout [Int] , p1: inout(Int, Int), p2: inout(Int,Int))->[Int]{
    x[p1.1]=x[p2.0]
    x[p2.1]=x[p1.0]
    return x
}

func srednia(x: inout [Int], n: Int) -> Double{
    var sr=0.0
    for i in 0..<n{
        sr += Double(x[i])
    }
    return (sr/Double(n))
}

var t:[Int] = []
print("Podaj ilosc elementow")
var licz = Int(readLine()!)!

t = wczytajTablice(x: &t, n: licz)
wyswietlTablice(x: &t)
var minimum:(Int,Int) = minTab(x: &t, n: licz)
var maksimum:(Int, Int) = maxTab(x: &t, n: licz)
t=swap(x: &t, p1: &minimum, p2: &maksimum)
print(srednia(x: &t, n: licz))



