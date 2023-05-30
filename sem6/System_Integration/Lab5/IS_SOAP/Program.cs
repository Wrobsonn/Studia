using ServiceReference1;

Console.WriteLine("My First SOAP Client!");
MyFirstSOAPInterfaceClient client = new
MyFirstSOAPInterfaceClient();
string text = await
client.getHelloWorldAsStringAsync("JAkub");
Console.WriteLine(text);



long days = await client.getDaysBetweenDatesAsync("01 04 2023", "04 04 2023");
Console.WriteLine(days);