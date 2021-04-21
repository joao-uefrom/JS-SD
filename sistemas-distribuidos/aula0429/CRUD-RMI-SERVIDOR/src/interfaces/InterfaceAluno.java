package interfaces;

import bean.AlunoBean;
import java.rmi.Remote;
import java.rmi.RemoteException;
import java.util.ArrayList;

public interface InterfaceAluno extends Remote{
    public String getNome()  throws RemoteException;
    public void setNome(String nome)  throws RemoteException;
    public double getMedia() throws RemoteException;
    public void setMedia(double media) throws RemoteException;
    public int getMatricula() throws RemoteException;
    public void setMatricula(int Matricula) throws RemoteException;
    public void adicionar() throws RemoteException;
    public ArrayList<AlunoBean> listar() throws RemoteException;
}
