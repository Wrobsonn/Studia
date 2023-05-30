print("Jakub Wróbel IIST 6.15 Integracja Systemów pon 15:00 - 16:30")
from deserialize_json import DeserializeJson
from serialize_json import JsonSerializer


newDeserializator = DeserializeJson('Assetes/data.json')
newDeserializator.somestats()
newDeserializator.number_of_individual_offices()



newDeserializator_2 = DeserializeJson('Assetes/data.json')
def serialize():
    JsonSerializer.run(
        newDeserializator_2.data,
        'Assetes/data_copy.json'
    )

serialize()

from convert_json_to_yaml import ConvertJsonToYaml

ConvertJsonToYaml.run(newDeserializator_2.data,
        'Assetes/data_copy_yaml.yaml'
    )

import yaml
tempconffile = open('Assetes/basic_config.yaml', encoding="utf8")
confdata = yaml.load(tempconffile, Loader=yaml.FullLoader)

x = input("podaj co zrobic\n")


if(x == "0"):
    newDeserializator.somestats()

if(x == "1"):
    newDeserializator.number_of_individual_offices()
if(x == "2"):
    serialize()
if(x == "3"):
    ConvertJsonToYaml.run(newDeserializator_2.data,
                          'Assetes/data_copy_yaml.yaml'
                          )

