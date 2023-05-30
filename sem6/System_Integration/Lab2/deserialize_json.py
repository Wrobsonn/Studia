# -*- coding: utf-8 -*-
"""
deserialize json
"""
import json
from voivodeship import Voivodeship

class DeserializeJson:
    # konstruktor
    def __init__(self, filename):
        print("let's deserialize something")
        temp_data = open(filename, encoding="utf8")
        self.data = json.load(temp_data)


    # przykładowe statystyki
    def somestats(self):

        example_stat = 0
        for dep in self.data["baza teleadresowa jst"]:
            if dep['typ_JST'] == 'GM' and dep['Województwo'] == 'dolnośląskie':
                example_stat += 1
        print('liczba urzędów miejskich w województwie dolnośląskim: ' + ' ' + str(example_stat))

    def number_of_individual_offices(self):
        voivodeship_names = set()
        for dep in self.data["baza teleadresowa jst"]:
            voivodeship_name = dep['Województwo']
            voivodeship_names.add(voivodeship_name)

        voivodeships = dict()
        for voivodeship_name in voivodeship_names:
            voivodeships[voivodeship_name] = Voivodeship(voivodeship_name)





        for dep in self.data["baza teleadresowa jst"]:
            jst_type = dep['typ_JST']
            voivodeship_name = dep['Województwo']
            if dep['typ_JST']  =='GW':
                voivodeships[dep['Województwo']].GW += 1

            if dep['typ_JST'] == 'GMW':
                voivodeships[dep['Województwo']].GMW += 1

            if dep['typ_JST']  == 'MNP':
                voivodeships[dep['Województwo']].MNP += 1
            if dep['typ_JST']  == 'dzielnica':
                voivodeships[dep['Województwo']].dzielnica += 1

            if dep['typ_JST']  == 'W':
                voivodeships[dep['Województwo']].W += 1

            if dep['typ_JST']  == 'GM':
                voivodeships[dep['Województwo']].GM += 1

            if dep['typ_JST']  == 'P':
                voivodeships[dep['Województwo']].P += 1


        print(voivodeships)


