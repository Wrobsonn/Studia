import Foundation



print("Podaj bok")
var a = Double(readLine()!)!
print("Podaj drugi bok")
var b = Double(readLine()!)!
var prostokat = Prostokat(bok1:a,bok2:b)
print("\(prostokat.pole())")
print("\(prostokat.obw())")
prostokat.dane()


print("Podaj wysokosc")
var h = Double(readLine()!)!
var prostopadloscian = Prostopadloscian(bok1: a, bok2: b, bok3: h)
print("\(prostopadloscian.pole())")
print("\(prostopadloscian.sumaK())")
print("\(prostopadloscian.V())")
prostopadloscian.dane()

func wczytajStudentow ( studenci: inout [Student],k: Int) -> [Student]{
    for _ in 0..<k{
        print("Nowy student")

        studenci.append(wczytajStudenta())
    }
    return studenci
}

func wczytajStudenta() -> Student{
    var oc: [Double] = Array(repeating: 0.0, count: 5 )
    for i in 0..<5{
        oc[i]=Double(readLine()!)!
    }
    let s = Student(im: readLine()!, nz: readLine()!, rok: Int(readLine()!)!,ind: Int(readLine()!)! , kier: readLine()!, rokst: Int(readLine()!)!, ocena: oc)
    return s
}

func wyswietl( studenci: [Student],k: Int){
    for i in 0..<k{
        studenci[i].dane()
    }
}

print("Podaj liczbe studentow")
let n = Int(readLine()!)!
var student: [Student] = []
wczytajStudentow(studenci: &student, k: n)
wyswietl(studenci: student, k: n)



var studentErazmus = StudentNaErasmusie(im: "Jan", nz: "Nowak", rok:2001,ind :12 , kier: "Informatyka", rokst: 3, ocena: [4.5,4.0,4.0,3.0,5.0], uczelniaZaGranica: "Oxford", dataRozpoczecia: Date.init(timeIntervalSince1970: 1655886411), kursy: [(2, "Polski"),(5,"Angielski")])

print("\(studentErazmus.czasNaErasmusie())")
studentErazmus.dane()
print("\(studentErazmus.ocena())")


class StudentNaErasmusie : Student {

    var uczelniaZaGranica: String
    var dataRozpoczecia: Date
    var kursy = [(Int, String)]()

    init(im: String, nz: String, rok:Int,ind : Int , kier: String, rokst: Int, ocena: [Double], uczelniaZaGranica: String, dataRozpoczecia: Date, kursy: [(Int, String)]) {
        self.uczelniaZaGranica = uczelniaZaGranica
        self.dataRozpoczecia = dataRozpoczecia
        self.kursy = kursy
        super.init(im: im, nz: nz, rok:rok,ind : ind , kier: kier, rokst: rokst, ocena: ocena)
    }

    override func dane() {
        super.dane()
        print("\(uczelniaZaGranica), \(dataRozpoczecia), \(kursy)")
    }

    func czasNaErasmusie() -> TimeInterval {
        return dataRozpoczecia.distance(to: Date())
    }

    func ocena() -> Double {

        var suma = 0.0

        for i in 0..<kursy.count {
            suma += Double(kursy[i].0)

        }
        return suma / Double(kursy.count)
    }
}


class Prostopadloscian:Prostokat {

    var h: Double = 0.0    

    init (bok1 : Double, bok2: Double, bok3: Double){
        super.init(bok1: bok1, bok2:bok2)
        self.h = bok3
    }

    override func pole() -> Double {
     return 6 * super.pole()
}

    func sumaK() -> Double{
        return 4*h + 4*a + 4*b
    }

    func V() -> Double{
        return h*a*b
    }

    override func dane(){
        super.dane()
        print("Wysokosc to \(h)")
    }
}


class Prostokat {

var a: Double = 0.0
var b: Double = 0.0

init(bok1: Double,bok2: Double){
self.a = bok1
self.b = bok2
}

func pole() -> Double {
return a * b
}

func obw() -> Double {
return 2*a + 2*b
}

func dane(){
    print("Dane \(a) \(b)")
}
}

class Osoba {
    var imie :String = ""
    var nazwisko : String = ""
    var rokUrodzeni :Int = 0

    init(im: String, nz: String, rok:Int){
        self.imie=im
        self.nazwisko = nz
        self.rokUrodzeni = rok
    }

    func wiek()->Int{
        return 2022 - rokUrodzeni
    }

    func dane(){
        print("\(imie) \(nazwisko) \(wiek())")
    }
}

class Student : Osoba{

     var Indeks: Int = 0
     var kierunek : String = ""
     var rokS : Int = 0
     var oceny: [Double] = Array(repeating: 2.0, count: 5)    

     init(im: String, nz: String, rok:Int,ind : Int , kier: String, rokst: Int, ocena: [Double]){
         super.init(im: im, nz: nz, rok:rok)
         self.Indeks=ind
         self.kierunek = kier
         self.rokS=rokst
         self.oceny=ocena
     }

     func srednia()->Double{
         var suma:Double=0.0
         for i in 0..<5{
             suma += oceny[i]
         }
         return suma/5.0
     }

    override func dane(){
        super.dane()
        print("\(Indeks) \(kierunek) \(rokS) \(oceny) \(srednia())")
    }
}