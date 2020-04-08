package servidor;

import java.rmi.Naming;
import java.rmi.RemoteException;
import java.rmi.registry.LocateRegistry;

public class IniciarServidor {
    public static void main(String[] args) {

        try {
            System.out.println("Iniciando Servidor...");
            LocateRegistry.createRegistry(1099);
            Naming.rebind("rmi://localhost:1099/CalculadoraRMI", new Calculadora());
        } catch (RemoteException re) {
            System.out.println("Erro Remoto: " + re.toString());
        } catch (Exception e) {
            System.out.println("Erro Local: " + e.toString());
        }

    }
}