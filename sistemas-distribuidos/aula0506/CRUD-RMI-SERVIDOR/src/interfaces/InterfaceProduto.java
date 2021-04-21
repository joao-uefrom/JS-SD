package interfaces;

import bean.ProdutoBean;
import java.rmi.RemoteException;

public interface InterfaceProduto extends InterfaceGlobal<ProdutoBean> {

    public String getDescricao() throws RemoteException;

    public void setDescricao(String descricao) throws RemoteException;

    public double getPreco() throws RemoteException;

    public void setPreco(double preco) throws RemoteException;

    public int getQuantidade() throws RemoteException;

    public void setQuantidade(int quantidade) throws RemoteException;

}
