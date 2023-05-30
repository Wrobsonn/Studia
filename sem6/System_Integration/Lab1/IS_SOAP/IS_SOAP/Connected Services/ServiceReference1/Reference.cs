﻿//------------------------------------------------------------------------------
// <auto-generated>
//     Ten kod został wygenerowany przez narzędzie.
//
//     Zmiany w tym pliku mogą spowodować niewłaściwe zachowanie i zostaną utracone
//     w przypadku ponownego wygenerowania kodu.
// </auto-generated>
//------------------------------------------------------------------------------

namespace ServiceReference1
{
    
    
    [System.CodeDom.Compiler.GeneratedCodeAttribute("Microsoft.Tools.ServiceModel.Svcutil", "2.1.0")]
    [System.ServiceModel.ServiceContractAttribute(Namespace="http://soapsoapsoap.com/", ConfigurationName="ServiceReference1.MyFirstSOAPInterface")]
    public interface MyFirstSOAPInterface
    {
        
        [System.ServiceModel.OperationContractAttribute(Action="http://soapsoapsoap.com/MyFirstSOAPInterface/getHelloWorldAsStringRequest", ReplyAction="http://soapsoapsoap.com/MyFirstSOAPInterface/getHelloWorldAsStringResponse")]
        [System.ServiceModel.DataContractFormatAttribute(Style=System.ServiceModel.OperationFormatStyle.Rpc)]
        [return: System.ServiceModel.MessageParameterAttribute(Name="return")]
        System.Threading.Tasks.Task<string> getHelloWorldAsStringAsync(string arg0);
        
        [System.ServiceModel.OperationContractAttribute(Action="http://soapsoapsoap.com/MyFirstSOAPInterface/getDaysBetweenDatesRequest", ReplyAction="http://soapsoapsoap.com/MyFirstSOAPInterface/getDaysBetweenDatesResponse")]
        [System.ServiceModel.DataContractFormatAttribute(Style=System.ServiceModel.OperationFormatStyle.Rpc)]
        [return: System.ServiceModel.MessageParameterAttribute(Name="return")]
        System.Threading.Tasks.Task<long> getDaysBetweenDatesAsync(string arg0, string arg1);
    }
    
    [System.CodeDom.Compiler.GeneratedCodeAttribute("Microsoft.Tools.ServiceModel.Svcutil", "2.1.0")]
    public interface MyFirstSOAPInterfaceChannel : ServiceReference1.MyFirstSOAPInterface, System.ServiceModel.IClientChannel
    {
    }
    
    [System.Diagnostics.DebuggerStepThroughAttribute()]
    [System.CodeDom.Compiler.GeneratedCodeAttribute("Microsoft.Tools.ServiceModel.Svcutil", "2.1.0")]
    public partial class MyFirstSOAPInterfaceClient : System.ServiceModel.ClientBase<ServiceReference1.MyFirstSOAPInterface>, ServiceReference1.MyFirstSOAPInterface
    {
        
        /// <summary>
        /// Wdróż tę metodę częściową, aby skonfigurować punkt końcowy usługi.
        /// </summary>
        /// <param name="serviceEndpoint">Punkt końcowy do skonfigurowania</param>
        /// <param name="clientCredentials">Poświadczenia klienta</param>
        static partial void ConfigureEndpoint(System.ServiceModel.Description.ServiceEndpoint serviceEndpoint, System.ServiceModel.Description.ClientCredentials clientCredentials);
        
        public MyFirstSOAPInterfaceClient() : 
                base(MyFirstSOAPInterfaceClient.GetDefaultBinding(), MyFirstSOAPInterfaceClient.GetDefaultEndpointAddress())
        {
            this.Endpoint.Name = EndpointConfiguration.MyFirstWSPort.ToString();
            ConfigureEndpoint(this.Endpoint, this.ClientCredentials);
        }
        
        public MyFirstSOAPInterfaceClient(EndpointConfiguration endpointConfiguration) : 
                base(MyFirstSOAPInterfaceClient.GetBindingForEndpoint(endpointConfiguration), MyFirstSOAPInterfaceClient.GetEndpointAddress(endpointConfiguration))
        {
            this.Endpoint.Name = endpointConfiguration.ToString();
            ConfigureEndpoint(this.Endpoint, this.ClientCredentials);
        }
        
        public MyFirstSOAPInterfaceClient(EndpointConfiguration endpointConfiguration, string remoteAddress) : 
                base(MyFirstSOAPInterfaceClient.GetBindingForEndpoint(endpointConfiguration), new System.ServiceModel.EndpointAddress(remoteAddress))
        {
            this.Endpoint.Name = endpointConfiguration.ToString();
            ConfigureEndpoint(this.Endpoint, this.ClientCredentials);
        }
        
        public MyFirstSOAPInterfaceClient(EndpointConfiguration endpointConfiguration, System.ServiceModel.EndpointAddress remoteAddress) : 
                base(MyFirstSOAPInterfaceClient.GetBindingForEndpoint(endpointConfiguration), remoteAddress)
        {
            this.Endpoint.Name = endpointConfiguration.ToString();
            ConfigureEndpoint(this.Endpoint, this.ClientCredentials);
        }
        
        public MyFirstSOAPInterfaceClient(System.ServiceModel.Channels.Binding binding, System.ServiceModel.EndpointAddress remoteAddress) : 
                base(binding, remoteAddress)
        {
        }
        
        public System.Threading.Tasks.Task<string> getHelloWorldAsStringAsync(string arg0)
        {
            return base.Channel.getHelloWorldAsStringAsync(arg0);
        }
        
        public System.Threading.Tasks.Task<long> getDaysBetweenDatesAsync(string arg0, string arg1)
        {
            return base.Channel.getDaysBetweenDatesAsync(arg0, arg1);
        }
        
        public virtual System.Threading.Tasks.Task OpenAsync()
        {
            return System.Threading.Tasks.Task.Factory.FromAsync(((System.ServiceModel.ICommunicationObject)(this)).BeginOpen(null, null), new System.Action<System.IAsyncResult>(((System.ServiceModel.ICommunicationObject)(this)).EndOpen));
        }
        
        private static System.ServiceModel.Channels.Binding GetBindingForEndpoint(EndpointConfiguration endpointConfiguration)
        {
            if ((endpointConfiguration == EndpointConfiguration.MyFirstWSPort))
            {
                System.ServiceModel.BasicHttpBinding result = new System.ServiceModel.BasicHttpBinding();
                result.MaxBufferSize = int.MaxValue;
                result.ReaderQuotas = System.Xml.XmlDictionaryReaderQuotas.Max;
                result.MaxReceivedMessageSize = int.MaxValue;
                result.AllowCookies = true;
                return result;
            }
            throw new System.InvalidOperationException(string.Format("Nie można znaleźć punktu końcowego o nazwie „{0}”.", endpointConfiguration));
        }
        
        private static System.ServiceModel.EndpointAddress GetEndpointAddress(EndpointConfiguration endpointConfiguration)
        {
            if ((endpointConfiguration == EndpointConfiguration.MyFirstWSPort))
            {
                return new System.ServiceModel.EndpointAddress("http://localhost:7779/ws/first");
            }
            throw new System.InvalidOperationException(string.Format("Nie można znaleźć punktu końcowego o nazwie „{0}”.", endpointConfiguration));
        }
        
        private static System.ServiceModel.Channels.Binding GetDefaultBinding()
        {
            return MyFirstSOAPInterfaceClient.GetBindingForEndpoint(EndpointConfiguration.MyFirstWSPort);
        }
        
        private static System.ServiceModel.EndpointAddress GetDefaultEndpointAddress()
        {
            return MyFirstSOAPInterfaceClient.GetEndpointAddress(EndpointConfiguration.MyFirstWSPort);
        }
        
        public enum EndpointConfiguration
        {
            
            MyFirstWSPort,
        }
       



    }
}
