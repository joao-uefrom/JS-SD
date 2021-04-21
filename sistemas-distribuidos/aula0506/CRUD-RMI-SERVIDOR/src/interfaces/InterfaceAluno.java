package interfaces;

import bean.AlunoBean;
import java.rmi.RemoteException;

public interface InterfaceAluno extends InterfaceGlobal<AlunoBean> {

    public String getNome() throws RemoteException;

    public void setNome(String nome) throws RemoteException;

    public double getMedia() throws RemoteException;

    public void setMedia(double media) throws RemoteException;

    public int getMatricula() throws RemoteException;

    public void setMatricula(int Matricula) throws RemoteException;

}
