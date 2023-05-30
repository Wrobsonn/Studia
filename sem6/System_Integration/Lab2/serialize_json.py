# -*- coding: utf-8 -*-
"""
serialize json
"""
import json

class JsonSerializer:
    # metoda statyczna

    @staticmethod
    def run(deserializeddata, filelocation):
        print("let's serialize something")
        lst = []
    # TODO – do modyfikacji
        for dep in deserializeddata["baza teleadresowa jst"]:
            lst.append({
                "Kod_TERYT": dep['Kod_TERYT'],
                "Województwo": dep['Województwo'],
                "typ_JST": dep['typ_JST'],
                "nazwa_urzędu_JST": dep['nazwa_urzędu_JST'],
                "miejscowość": dep['miejscowość']
            })
        jsontemp = {"departaments": lst}
        with open(filelocation, 'w', encoding='utf-8') as f:json.dump(jsontemp, f, ensure_ascii=False)
