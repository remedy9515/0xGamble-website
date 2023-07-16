// Web3Modal
import {
    EthereumClient,
    w3mConnectors,
    w3mProvider,
} from '@web3modal/ethereum'

import { Web3Modal } from '@web3modal/html'

import {
    configureChains,
    createConfig,
} from '@wagmi/core'

import { bsc } from '@wagmi/core/chains'

export const chains = [bsc];
const projectId = '5b8dcd434801f9b6cabe6bce141a706e';

const { publicClient } = configureChains(chains, [w3mProvider({ projectId })]);
const wagmiConfig = createConfig({
    autoConnect: true,
    connectors: w3mConnectors({ projectId, chains }),
    publicClient
});
export const ethereumClient = new EthereumClient(wagmiConfig, chains);

export const web3modal = new Web3Modal({
    projectId,
    defaultChain: bsc,
}, ethereumClient);